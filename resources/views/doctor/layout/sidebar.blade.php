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
        <a class="nav-link" href="/doctor">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Patient
    </div>

    <!-- Nav Item - Manage Pegawai -->
    <li class="nav-item mt-0 {{ ($nvb == 'detectHistory') ? 'active' : '' }}">
        <a class="nav-link" href="/doctor/history">
            <i class="bi bi-journal-medical"></i>
            <span>Patient Detection History</span></a>
    </li>

    <!-- Nav Item - Manage Pegawai -->
    <li class="nav-item mt-0 {{ ($nvb == 'validation') ? 'active' : '' }}">
        <a class="nav-link" href="/doctor/detection/validation">
            <i class="fa fa-heartbeat"></i>
            <span>Validation Detection</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
