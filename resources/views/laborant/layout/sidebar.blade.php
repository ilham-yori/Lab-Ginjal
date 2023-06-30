<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand align-items-center justify-content-center mb-5" href="/min">
        <div class="sidebar-brand-icon">
            <img class="img-thumbnail" style="background-color : transparent; border : none; max-width: 50px" src="{{ url('') }}/images/Kindney.png" alt="">
        </div>
        <div class="sidebar-brand-text">Kindney - Lab</div>
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
        Patient
    </div>

    <!-- Nav Item - Unvalidate Data -->
    <li class="nav-item mt-0 {{ ($nvb == 'unvalidateDetection') ? 'active' : '' }}">
        <a class="nav-link" href="/laborant/unvalidate">
            <i class="fas fa-file-medical-alt"></i>
            <span>Unvalidated Detection</span></a>
    </li>

    <!-- Nav Item - Prediction -->
    <li class="nav-item mt-0 {{ ($nvb == 'detection') ? 'active' : '' }}">
        <a class="nav-link" href="/laborant/detection/create">
            <i class="fas fa-head-side-virus"></i>
            <span>Disease Detection</span></a>
    </li>

    <!-- Nav Item - Decetion Hisotry -->
    <li class="nav-item mt-0 {{ ($nvb == 'detectionHistory') ? 'active' : '' }}">
        <a class="nav-link" href="/laborant/history">
            <i class="fas fa-procedures"></i>
            <span>Patient Detection History</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
