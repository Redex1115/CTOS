
  <!--SideNav-->       
  @if(auth()->user()->isAdmin())
  <div id="mySideNav" class="sidenav">
            <ul style="padding-left:10px;">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> 
            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li><a href="#">BlackList</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="/logout">Logout</a></li>
            </ul>
            </div>
            @elseif(auth()->user()->isAgent())
            <div id="mySideNav" class="sidenav">
            <ul style="padding-left:10px;">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li><a href="#">BlackList</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="/logout">Logout</a></li>
            </ul>
            </div>
            @endif
