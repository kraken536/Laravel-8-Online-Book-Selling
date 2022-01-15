@if(Auth::check())
    @if (Auth::user()->profile_photo_path)
        <li class="dropdown"><a href="#"><img src="{{ Storage::url(Auth::user()->profile_photo_path) }}"  style="font-size:35px; border-radius: 30px" width="40" class="tof" >
    @else
        <li class="dropdown"><a href="#"><i class="bi-person-circle" style="font-size:35px"></i>
    @endif

@else
    <li class="dropdown"><a href="#"><i class="bi-person-circle" style="font-size:35px"></i>
@endif
    @if(Auth::check())<i class="bi bi-chevron-down"></i>
    <span>&nbsp;&nbsp;{{ Auth::user()->name }}</span>
        <ul>
            <li style="margin-top: -3.2em"><a href="{{route('profile')}}" onMouseOver="this.style.color='blue'"
                onMouseOut="this.style.color='grey'"><img src="{{ asset('assets')}}/useri2.png" width="35">My Account</a></li>
            <li><a href="{{route('myReviews')}}" onMouseOver="this.style.color='blue'"
                onMouseOut="this.style.color='grey'"><img src="{{ asset('assets')}}/reviews.png" width="35">My Reviews</a></li>
            <li><a href="{{route('user_shopcart')}}" onMouseOver="this.style.color='blue'"
                onMouseOut="this.style.color='grey'"><img src="{{ asset('assets')}}/shopping-cart.png" width="35">My ShopCart</a></li>
            <li><a href="#" onMouseOver="this.style.color='blue'"
                onMouseOut="this.style.color='grey'"><img src="{{ asset('assets')}}/wishlist.png" width="35">My Wishlist</a></li>
                @php
                $userRoles = Auth::user()->roles->pluck('name');
                @endphp
        
                @if($userRoles->contains('Admin'))
                <li><a href="{{route('admin_home')}}" onMouseOver="this.style.color='blue'"
                    onMouseOut="this.style.color='grey'" target="_blank"><img src="{{ asset('assets')}}/admin.png" width="35">Admin Panel</a></li>
                @endif
                
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
        onMouseOut="this.style.color='grey'"><i class="material-icons" style="color:green; font-size:35px">login</i>Login/Register</a></li>
@endif


