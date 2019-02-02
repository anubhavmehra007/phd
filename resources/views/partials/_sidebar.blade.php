<!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
          <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-building"></i>
            <span>Colleges</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-store"></i>
            <span>Departmens</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Guides</span></a>
        </li>
        <li class="nav-item {{ Request::is('scholars/create' || 'scholars') ? "active" : "" }}">
          <a class="nav-link" href="{{ url('/scholars') }}">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Scholars</span></a>
        </li>
      </ul>