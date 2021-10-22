<nav id="sidebar">
    <div class="sidebar-header">
        <div class="user">
            <img src="{{asset(auth()->user()->avatar)}}">
        </div>
        <h3>{{Auth::user()->name}}</h3>
        <strong></strong>
    </div>

    <ul class="list-unstyled components">
        <!-- <li class="active">
            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-home"></i> Home
            </a>
            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li> -->
        <!-- <li>
            <a href="#">
                <i class="fas fa-briefcase"></i> About
            </a>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fas fa-copy"></i> Pages
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul>
        </li> -->
        <li>
            <a href="{{route('home')}}">
                <i class="fas fa-home"></i> Home
            </a>
        </li>
        <li>
            <a href="{{route('employee.admin')}}">
                <i class="fas fa-users"></i> Employee
            </a>
        </li>
        <li>
            <a href="{{route('categories.admin')}}">
                <i class="fas fa-paper-plane"></i> Categories
            </a>
        </li>
        <li>
            <a href="{{route('maps.admin')}}">
                <i class="fas fa-map-marker-alt"></i> Places
            </a>
        </li>
        <li>
            <a href="{{route('products.admin')}}">
                <i class="fas fa-box"></i> Products
            </a>
        </li>
    </ul>



    <!-- <ul class="list-unstyled CTAs">
        <li>
            <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
        </li>
        <li>
            <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
        </li>
    </ul> -->
    <ul class="list-unstyled CTAs">
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-dark" type="submit">Log out</button>
            </form>
        </li>
    </ul>
</nav>