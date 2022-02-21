  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <a href="{{route('dashboard')}}" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
    </li>
    <li class="nav-item">
    <a href="#" class="nav-link">
      <i class="far fa-address-card"></i>
      <p>
        Users
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{route('viewUsers')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>view Users</p>
        </a>
      </li>
   
    </ul>
  </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-tags"></i>
              <p>
                Categories
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('viewCategories')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('addCategory')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Categories</p>
                </a>
              </li>
            </ul>
          </li>
       
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-tags"></i>
              <p>
                Posts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('viewPosts')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('addPost')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Posts</p>
                </a>
              </li>
            </ul>
          </li>
    </ul>
  </nav>