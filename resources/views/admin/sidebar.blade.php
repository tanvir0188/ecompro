<nav id="sidebar">
    <!-- Sidebar Header -->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar">
            <img src="{{ asset('admintemplate/img/avatar-6.jpg') }}" alt="..." class="img-fluid rounded-circle">
        </div>
        <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
        </div>
    </div>

    <!-- Sidebar Navigation Menus -->
    <span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ url('admin/dashboard') }}"> 
                <i class="icon-home"></i>Home 
            </a>
        </li>
        <li class="{{ Request::is('userList') ? 'active' : '' }}">
            <a href="{{ url('userList') }}"> 
                <i class="fa fa-user"></i>Users 
            </a>
        </li>
        <li class="{{ Request::is('view_category') ? 'active' : '' }}">
            <a href="{{ url('view_category') }}"> 
                <i class="icon-grid"></i>Category
            </a>
        </li>
        <li class="{{ Request::is('order_list_view') ? 'active' : '' }}">
            <a href="{{ url('order_list_view') }}"> 
                <i class="fa fa-list"></i>Orders 
            </a>
        </li>
        <li class="{{ Request::is('add_product') ? 'active' : '' }}">
            <a href="{{ url('add_product') }}"> 
                <i class="fa fa-bar-chart"></i>Products 
            </a>
        </li>
    </ul>
    <span class="heading">Extras</span>
    <ul class="list-unstyled">
        <!-- Add extra links here -->
    </ul>
</nav>
