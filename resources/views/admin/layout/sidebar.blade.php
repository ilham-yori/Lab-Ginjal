<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand align-items-center justify-content-center mb-5" href="/min">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img class="img-thumbnail" style="background-color : transparent; border : none; max-width: 50px" src="{{ url('') }}/img/ladang_icon.png" alt="">
        </div>        
        <div class="sidebar-brand-text">PT. Ladang Karya Husada</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0 mt-5">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item mt-0 {{ ($nvb == 'home') ? 'active' : '' }}">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <li class="nav-item {{ ($nvb == 'user') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/user"><i class="fas fa-fw fa-users"></i><span> Users</span></a>
    </li>    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Blog
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ ($nvb == 'post') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-file"></i>
            <span>Post</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">                
                <a class="collapse-item" href="/admin/posts/new">New Post</a>
                <a class="collapse-item" href="/admin/posts">Post</a>            
            </div>
        </div>
    </li>    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>