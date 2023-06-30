<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{Route('home')}}" class="brand-link">
        <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Trang người dùng</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('admin_index')}}" class="d-block">Admin</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/admin/categories/index" class="nav-link">
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Danh mục sự kiện
                           
                        </p>
                    </a>
                    
                </li>
 
                <li class="nav-item">
                    <a href="/admin/event/index" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Sự kiện
                            
                        </p>
                    </a>
                    
                </li>

                <li class="nav-item">
                    <a href="/admin/event_image/index" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Ảnh sự kiện
                            
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/titket/index" class="nav-link">
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                            Vé
                            
                        </p>
                    </a>
                   
                </li>
                <li class="nav-item">
                    <a href="/admin/banner/index" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Banner
                            
                        </p>
                    </a>
                    
                </li>
                <li class="nav-item">
                    <a href="/admin/page_infor/index" class="nav-link">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            Thông Tin Trang Chủ
                            
                        </p>
                    </a>
                    
                </li>
                <li class="nav-item">
                    <a href="/admin/user/index" class="nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            Người dùng
                            
                        </p>
                    </a>
                   
                </li>
                
                
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
