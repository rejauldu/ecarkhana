<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chat;
use App\Block;
use Carbon\Carbon;
use App\User;
use Auth;
use DB;

class ChatController extends Controller
{
	public function __construct() {
		
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = Auth::user();
		$chat = Chat::where('sender_id', $user->id)->orWhere('receiver_id', $user->id)->latest()->first();
		$partner_id = 1;
		if($chat)
			$partner_id = $user->id == $chat->sender_id?$chat->receiver_id:$chat->sender_id;
		return redirect(route('chats.show', $partner_id));
    }
    public function indexFront()
    {
        $user = Auth::user();
        $chat = Chat::where('sender_id', $user->id)->orWhere('receiver_id', $user->id)->latest()->first();
        $partner_id = 1;
        if($chat)
            $partner_id = $user->id == $chat->sender_id?$chat->receiver_id:$chat->sender_id;
        return redirect(route('seller-message.show', $partner_id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$data = $request->all();
		
		if($data['type'] == 'text' && $data['sender_id'] === Auth::user()->id) {
			if($this->isBlocked($data)) {
				return 'Your message is not delivered. This person has blocked your account in chat.';
			}
			$lazy_loaded_chat = Chat::create($request->except('id'));
			$chat = Chat::with('sender', 'receiver')->where('id', $lazy_loaded_chat->id)->first()->toArray();
			broadcast(new \App\Events\PrivateChatEvent($chat))->toOthers();
			return '{"client_id":'.$request->id.', "server_id":'.$chat['id'].', "created_at":"'.$chat['created_at'].'"}';
		} elseif($data['type'] == 'received_notification') {
			$now = Carbon::now();
			Chat::find($data['id'])->update(['sent_at' => $now]);
			$data['sent_at'] = $now;
			broadcast(new \App\Events\PrivateChatEvent($data))->toOthers();
			return $data;
		} elseif($data['type'] == 'viewed_notification') {
			$now = Carbon::now();
			if($data['id']) 
				Chat::find($data['id'])->update(['viewed_at' => $now]);
			else
				Chat::whereNull('viewed_at')->where('receiver_id', Auth::user()->id)->where('sender_id', $data['receiver_id'])->update(['viewed_at' => $now]);
			$data['viewed_at'] = $now;
			broadcast(new \App\Events\PrivateChatEvent($data))->toOthers();
			return $data;
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		if($id == Auth::user()->id) {
			return redirect(route('chats.index'));
		}
		$user = User::select('id', 'name', 'photo')->where('id', Auth::user()->id)->first();
		$partner = User::select('id', 'name', 'photo')->where('id', $id)->first();
        $messages = Chat::select('id', 'type', 'message', 'sender_id', 'receiver_id', 'sent_at', 'viewed_at', 'created_at')
        	->where(function($query) use($id, $user) {
        		$query->where(function($p) use($id, $user) {
					$p->where('sender_id', $id)
					->where('receiver_id', $user->id);
				})
				->orWhere(function($q) use($id, $user) {
					$q->where('sender_id', $user->id)
					->where('receiver_id', $id);
				});
        	})
			->where('deleted_by', '!=', $user->id)
			->where('deleted_by', '!=', -2)
			->latest()
			->take(20)
			->get()
			->reverse()
			->values();
		$user_id = Auth::user()->id;
		$message_list = Chat::where(function($p) use($user_id) {
				$p->where('sender_id', $user_id)
				->orWhere('receiver_id', $user_id);
			})
			->whereNotIn('deleted_by', [-2, $user_id])
			->whereIn('id', function($query) {
			   $query->from('chats')->groupBy(DB::raw("if(receiver_id>sender_id, receiver_id, sender_id), if(receiver_id>sender_id, sender_id, receiver_id)"))->selectRaw('MAX(id)');
			})
			->take(20)
			->latest()
			->with(['sender', 'receiver'])
			->get();
        return view('backend.chats.chat', compact('messages', 'message_list', 'user', 'partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function block($id)
    {
    	$user = Auth::user();
    	$blocks = Block::where('blocked_id', $id)->where('blocked_by', $user->id)->count();
    	if ($blocks > 0) {
	        return redirect()->back();
	    }
        Block::create(['blocked_id' => $id, 'blocked_by' => $user->id]);
        return redirect()->back();
    }
    private function isBlocked($data)
    {
    	$user = Auth::user();
    	$blocks = Block::where(function($q) use($data) {
    		$q->where('blocked_id', $data['sender_id'])
    		->where('blocked_by', $data['receiver_id']);
    	})
    	->orWhere(function($q) use($data) {
    		$q->where('blocked_id', $data['receiver_id'])
    		->where('blocked_by', $data['sender_id']);
    	})->count();
    	if($blocks>0) {
	    	$b = Block::where('blocked_id', $data['sender_id'])->where('blocked_by', $data['receiver_id'])->count();
	    	if ($b > 0) {
		        return true;
		    } else {
		    	Block::where('blocked_id', $data['receiver_id'])->where('blocked_by', $data['sender_id'])->delete();
		    }
		}
		return false;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
    	$user = Auth::user();
    	Chat::where(function($query) use($id, $user) {
    		$query->where(function($p) use($id, $user) {
				$p->where('sender_id', $id)
				->where('receiver_id', $user->id);
			})
			->orWhere(function($q) use($id, $user) {
				$q->where('sender_id', $user->id)
				->where('receiver_id', $id);
			});
    	})
		->where('deleted_by', 0)
		->update(['deleted_by' => $user->id]);

		Chat::where(function($query) use($id, $user) {
    		$query->where(function($p) use($id, $user) {
				$p->where('sender_id', $id)
				->where('receiver_id', $user->id);
			})
			->orWhere(function($q) use($id, $user) {
				$q->where('sender_id', $user->id)
				->where('receiver_id', $id);
			});
    	})
		->where('deleted_by', $id)
		->update(['deleted_by' => -2]);
		return redirect()->back();
    }
    public function showFront($id)
    {
        if($id == Auth::user()->id) {
            return redirect(route('seller-message'));
        }
        $user = User::select('id', 'name', 'photo')->where('id', Auth::user()->id)->first();
        $partner = User::select('id', 'name', 'photo')->where('id', $id)->first();
        $messages = Chat::select('id', 'type', 'message', 'sender_id', 'receiver_id', 'sent_at', 'viewed_at', 'created_at')
            ->where(function($p) use($id, $user) {
                $p->where('sender_id', $id)
                ->where('receiver_id', $user->id);
            })
            ->orWhere(function($q) use($id, $user) {
                $q->where('sender_id', $user->id)
                ->where('receiver_id', $id);
            })->get();
        $user_id = Auth::user()->id;
        $message_list = Chat::where(function($p) use($user_id) {
                $p->where('sender_id', $user_id)
                ->orWhere('receiver_id', $user_id);
            })
            ->whereNotIn('deleted_by', [-2, $user_id])
            ->whereIn('id', function($query) {
               $query->from('chats')->groupBy(DB::raw("if(receiver_id>sender_id, receiver_id, sender_id), if(receiver_id>sender_id, sender_id, receiver_id)"))->selectRaw('MAX(id)');
            })
            ->orderBy('id', 'desc')
            ->with(['sender', 'receiver'])
            ->get();
        return view('frontend.seller-message', compact('messages', 'message_list', 'user', 'partner'));
    }
}