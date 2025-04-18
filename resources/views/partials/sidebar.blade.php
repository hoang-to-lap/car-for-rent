<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name  }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="{{route('categories.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh Mục Xe
          
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('settings.edit')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Setting
                
              </p>
            </a>
          </li>
       
          <li class="nav-item">
            <a href="{{route('car.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Quản Lý Xe
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('slider.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Quản Lý Slide
                
              </p>
            </a>
          </li>
       
          <li class="nav-item">
            <a href="{{route('newscategory.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Danh mục tin tức
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('news.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Tin tức
                
              </p>
            </a>
          </li>
   
          <li class="nav-item">
            <a href="{{route('bookings.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Quản lý khách hàng
                
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>