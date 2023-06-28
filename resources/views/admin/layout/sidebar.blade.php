<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand align-items-center justify-content-center mb-5" href="/min">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img class="img-thumbnail" style="background-color : transparent; border : none; max-width: 50px" src="{{ url('') }}/img/ladang_icon.png" alt="">
        </div>
        <div class="sidebar-brand-text">Laboratorium</div>
    </a>


    <!-- Heading -->
    <div class="sidebar-heading">
        Main Menu
    </div>

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
        Manage
    </div>

     <!-- Nav Item - Manage Employee -->
     <li class="nav-item mt-0 {{ ($nvb == 'employee') ? 'active' : '' }}">
        <a class="nav-link" href="/employee">
            <i class="fas fa-fw fa-hospital"></i>
            <span>Hospital Employees</span></a>
    </li>

     <!-- Nav Item - Manage Patient -->
     <li class="nav-item mt-0 {{ ($nvb == 'patient') ? 'active' : '' }}">
        <a class="nav-link" href="/patient">
            <i class="fas fa-fw fa-users"></i>
            <span>Patients</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
