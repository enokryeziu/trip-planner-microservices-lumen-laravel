<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                    <ul>
                        <li><a href="#">Visit Us</a></li>
                        <li><a href="#">Buy Tickets</a></li>
                    </ul>			
                </div>
                <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                    <div class="header-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>			  					
        </div>
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="{{ url('/') }}"><img src="{{asset("img/logo.png")}}" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/about')}}">About</a></li>
                    <li><a href="{{ url('/planner') }}">Trip Planner</a></li>
                    <li><a href="{{ url('/tours') }}">Tours</a></li>
                    <li><a href="{{ url('/insurance') }}">Insurance</a></li>
                    <li><a href="{{ url('/contact')}}">Contact</a></li>
                    <li class="menu-has-children"><a href="">Blog</a>
                        <ul>
                            <li><a href="blog-home.html">Blog Home</a></li>
                            <li><a href="blog-single.html">Blog Single</a></li>
                        </ul>
                    </li>	
                    @if (Auth::guard('web')->check( )) 
                        <li><a href="{{ url('/users/logout') }}">Logout</a></li>	          					          		          
                    @elseif (Auth::guard('admin')->check( ))
                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                    @else
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <script>
                       var x = document.querySelector(".nav-menu li");
                       x.remove(x.childNodes[0]);
                    </script>
                    @endif
                </ul>
            </nav><!-- #nav-menu-container -->					      		  
        </div>
    </div>
</header><!-- #header -->