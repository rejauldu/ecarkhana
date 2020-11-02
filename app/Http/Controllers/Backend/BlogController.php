<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Blog;
use App\Category;
use Illuminate\Support\Facades\File;

class BlogController extends Controller {

    public function __construct() {
        $this->middleware('moderator:Product', ['except' => [
                'index', 'show'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        
        $posts = Blog::orderBy('id', 'desc');
        if($request->category) {
            $posts->where('category_id', $request->category);
            if ($request->category == 2) {
                $type = "Motorcycle";
            } elseif ($request->category == 3) {
                $type = "Bicycle";
            } else {
                $type = "Car";
            }
        }
        $posts = $posts->paginate(10);
        $categories = Category::all();
        return view('backend.blogs.index', compact('posts', 'categories', 'type'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageIndex() {
        $posts = Blog::orderBy('id', 'desc')->get();
        return view('backend.blogs.manage-index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::all();
        return view('backend.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->except('_token', '_method');
        $data['user_id'] = Auth::user()->id;
        $file = $request->file('photo');
        if ($file) {
            $destination_path = 'assets/blogs';
            $new_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destination_path, $new_name);
            $data['photo'] = $new_name;
        }
        $thumbnail = $request->file('thumbnail');
        if ($thumbnail) {
            $destination_path = 'assets/blogs';
            $new_name = time() . '-thumb.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destination_path, $new_name);
            $data['thumbnail'] = $new_name;
        }
        Blog::create($data);
        return redirect(route('manage-blogs'))->with('message', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $post = Blog::with('comments.user', 'comments.sub_comments.user', 'category')->find($id);
        $categories = Category::all();
        $type = $post->category->name;
        return view('backend.blogs.show', compact('post', 'categories', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $post = Blog::find($id);
        $categories = Category::all();
        return view('backend.blogs.create', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $data = $request->except('_token', '_method');
        $data['user_id'] = Auth::user()->id;
        $post = Blog::find($id);
        $file = $request->file('photo');
        $directory = '/assets/blogs/';
        if ($file) {
            $destination_path = 'assets/blogs';
            $new_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move($destination_path, $new_name);
            $data['photo'] = $new_name;
            File::delete($directory . $post->photo);
        }
        $thumbnail = $request->file('thumbnail');
        if ($thumbnail) {
            $destination_path = 'assets/blogs';
            $new_name = time() . '-thumb.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destination_path, $new_name);
            $data['thumbnail'] = $new_name;
            File::delete($directory . $post->thumbnail);
        }
        $post->update($data);
        return redirect(route('blogs.index'))->with('message', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $post = Blog::find($id);
        $directory = '/assets/blogs/';
        File::delete($directory . $post->photo);
        File::delete($directory . $post->thumbnail);
        $post->delete();
        return redirect()->back()->with('message', 'Blog has been deleted');
    }

}
