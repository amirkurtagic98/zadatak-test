<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo"><a href="#" class="simple-text logo-normal">
        Book Club
    </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('books') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('books') }}">
                    <p>Books</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('add-books') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('add-books') }}">
                    <p>Add Books</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('users') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('users') }}">
                    <p>Users</p>
                </a>
            </li>
        </ul>
    </div>
</div>