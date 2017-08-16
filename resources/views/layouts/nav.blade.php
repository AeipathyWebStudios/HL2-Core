<nav class="navbar navbar-default navbar-static-top">
   <div class="container-fluid">
      <div class="navbar-header">
         <!-- Collapsed Hamburger -->
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
         <span class="sr-only">Toggle Navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         </button>
         <!-- Branding Image -->
         <a class="navbar-brand" href="{{ url('/') }}">
			HL2:C
         </a>
      </div>
      <div class="collapse navbar-collapse" id="app-navbar-collapse">
         <!-- Left Side Of Navbar -->
         <ul class="nav navbar-nav">
            &nbsp;
         </ul>
         <!-- Right Side Of Navbar -->
         <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ route('about') }}">About HL2:Core</a></li>
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            @else
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
               {{ config('app.name') }} <span class="caret"></span>
               </a>
               <ul class="dropdown-menu" role="menu">
                  <li><a href="{{ route('game') }}"> Main Index </a></li>
                  <li><a href="{{ route('items') }}"><i class='fa fa-star'></i> All Items</a></li>
                  <!-- To do: Create main game index -->
               </ul>
            </li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
               {{ Auth::user()->name }} <span class="caret"></span>
               </a>
               <ul class="dropdown-menu" role="menu">
                  <li> <a href="{{ route('dashboard') }}"> Account Dashboard </a></li>
                  <li> <a href="{{ route('settings') }}"> Account Settings </a></li>
                  <li>
                     <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                     Logout
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                     </form>
                  </li>
               </ul>
            </li>
            @endif
         </ul>
      </div>
   </div>
</nav>