@if(Auth::check())
    @if (Auth::user()->profile_photo_path)
        <li class="dropdown"><a href="#"><img src="{{ Storage::url(Auth::user()->profile_photo_path) }}"  style="font-size:35px" width="40">
    @else
        <li class="dropdown"><a href="#"><i class="bi-person-circle" style="font-size:35px"></i>
    @endif

@else
    <li class="dropdown"><a href="#"><i class="bi-person-circle" style="font-size:35px"></i>
@endif

{{-- <li class="dropdown"><a href="#"><i class="bi-person-circle" style="font-size:35px"></i> --}}
    @if(Auth::check())<i class="bi bi-chevron-down"></i>
    <span>&nbsp;&nbsp;{{ Auth::user()->name }}</span>
        <ul>
            <li><a href="{{route('profile')}}" onMouseOver="this.style.color='blue'"
                onMouseOut="this.style.color='grey'"><img src="{{ asset('assets')}}/useri2.png" width="35">My Account</a></li>
            <li><a href="#">My Messages</a></li>
            <li><a href="#">My ShopCart</a></li>
            <li><a href="#">My Wishlist</a></li>
            <li><a href="{{route('logout_home')}}"><i class="material-icons" style="color:red; font-size:35px">logout</i>Logout</a></li>
        </ul>
    @else
        &nbsp;&nbsp;Guest
    @endif
</a>
</li>
@if (Auth::check())
    
@else
    <li class="log" id="log"><a href="{{route('loginHome')}}" onMouseOver="this.style.color='green'"
        onMouseOut="this.style.color='grey'"><i class="material-icons" style="color:green; font-size:35px">login</i>Login</a></li>
@endif


