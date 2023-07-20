@if(Auth::check())
    <li><a class="link link-hover" href="{{ route('users.index') }}">Users</a></li>
    <li><a class="link link-hover" href="{{ route('users.show', Auth::user()->id) }}">{{ Auth::user()->name }}&#39;s profile</a></li>
    <li class="divider lg:hidden"></li>
    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">Logout</a></li>
@else
    <li><a class="link link-hover" href="{{ route('register') }}">Signup</a></li>
    <li class="divider lg:hidden"></li>
    <li><a class="link link-hover" href="{{ route('login') }}">Login</a></li>
@endif