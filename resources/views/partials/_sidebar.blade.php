<!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
          <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item dropdown {{ Request::is('colleges','colleges/create') ? "active" : "" }}">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-building"></i>
                <span>Colleges</span></a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">            
                  <a class="dropdown-item" href="{{ url('/colleges') }}">College&rsquo;s Detail</a>
                  <a class="dropdown-item" href="{{ route('colleges.create') }}">Register New College</a>        
                  
                </div>
          
        </li>
        <li class="nav-item dropdown {{ Request::is('departments') ? "active" : "" }}">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-store"></i>
            <span>Subjects</span></a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">            
              <a class="dropdown-item" href="{{ url('/subjects') }}">Subject&rsquo;s Detail</a>
              <a class="dropdown-item" href="{{ route('subjects.create') }}">Add New Subject</a>      
            </div>
        </li>
        <li class="nav-item dropdown {{ Request::is('guides') ? "active" : "" }}">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-user-tie"></i>
              <span>Guides</span></a>
              <div class="dropdown-menu" aria-labelledby="pagesDropdown">            
                <a class="dropdown-item" href="{{ url('/guides') }}">Guide&rsquo;s Detail</a>
                <a class="dropdown-item" href="{{ route('guides.create') }}">Add New Guide</a>      
              </div>
          
        </li>
        <li class="nav-item dropdown {{ Request::is('scholars') ? "active" : "" }}">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Scholars</span></a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">            
              <a class="dropdown-item" href="{{ url('/scholars') }}">Scholar&rsquo;s Detail</a>
              <a class="dropdown-item" href="{{ route('scholars.create') }}">Register New Scholar</a>        
              
            </div>
        </li>
      </ul>