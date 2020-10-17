<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar bg-light">
		<chat-list :user='@json($user)' :partner='@json($partner)' :message_list='@json($message_list)' @if(session()->has('message')) error='{{ session()->get('message') }}' @endif></chat-list>
</aside>