@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin')}}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.logout')}}" title="Logout">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{url('assets')}}/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Zonex Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->avatar)
                <img src="{{url('images/avatars')}}/{{Auth::user()->avatar}}" class="img-circle elevation-2" alt="User Image">
                @else
                <image id="profileImage" width="100%" src="{{url('assets')}}/frontend/images/user-image.png">
                @endif
            </div>
            <div class="info">
                <div class="row">
                    <div class="col-md-6">
                        <p class="d-block">{{Auth::user()->name}}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin')}}" class="nav-link {{(explode('.',$route)[0] == 'admin') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>            
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">DATA MANAGER</li>
                
                <li class="nav-item {{(explode('.',$route)[0] == 'category') ? 'menu-open' : ''}}">
                    <a href="" class="nav-link {{(explode('.',$route)[0] == 'category') ? 'active' : ''}}">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('category.index')}}" class="nav-link {{($route == 'category.index') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Category</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('category.create')}}" class="nav-link {{($route == 'category.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{(explode('.',$route)[0] == 'brand') ? 'menu-open' : ''}}">
                    <a href="" class="nav-link {{(explode('.',$route)[0] == 'brand') ? 'active' : ''}}">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>
                            Brand
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('brand.index')}}" class="nav-link {{($route == 'brand.index') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Brand</p>
                            </a>
                        </li>    
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('brand.create')}}" class="nav-link {{($route == 'brand.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Brand</p>
                            </a>
                        </li>    
                    </ul>
                </li>

                <li class="nav-item {{(explode('.',$route)[0] == 'material') ? 'menu-open' : ''}}">
                    <a href="" class="nav-link {{(explode('.',$route)[0] == 'material') ? 'active' : ''}}">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>
                            Material
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('material.index')}}" class="nav-link {{($route == 'material.index') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Material</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('material.create')}}" class="nav-link {{($route == 'material.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Material</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{(explode('.',$route)[0] == 'attribute') ? 'menu-open' : ''}}">
                    <a href="" class="nav-link {{(explode('.',$route)[0] == 'attribute') ? 'active' : ''}}">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>
                            Attribute
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('attribute.index')}}" class="nav-link {{($route == 'attribute.index') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Attribute</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('attribute.create')}}" class="nav-link {{($route == 'attribute.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Attribute</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{(explode('.',$route)[0] == 'product') ? 'menu-open' : ''}}">
                    <a href="" class="nav-link {{(explode('.',$route)[0] == 'product') ? 'active' : ''}}">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>
                            Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('product.index')}}" class="nav-link {{($route == 'product.index') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Product</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('product.create')}}" class="nav-link {{($route == 'product.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">INTERFACE MANAGER</li>

                <li class="nav-item {{(explode('.',$route)[0] == 'banner') ? 'menu-open' : ''}}">
                    <a href="" class="nav-link {{(explode('.',$route)[0] == 'banner') ? 'active' : ''}}">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>
                            Banner
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('banner.index')}}" class="nav-link {{($route == 'banner.index') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Banner</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('banner.create')}}" class="nav-link {{($route == 'banner.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Banner</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{(explode('.',$route)[0] == 'blog') ? 'menu-open' : ''}}">
                    <a href="" class="nav-link {{(explode('.',$route)[0] == 'blog') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Blog
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('blog.index')}}" class="nav-link {{($route == 'blog.index') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Blog</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('blog.create')}}" class="nav-link {{($route == 'blog.create') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Blog</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">USER MANAGEMENT</li>
                <li class="nav-item">
                    <a href="{{route('user')}}" class="nav-link {{(explode('.',$route)[0] == 'user') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>            
                            User Management
                        </p>
                    </a>
                </li>

                <li class="nav-header">ORDER MANAGER</li>
                <li class="nav-item">
                    <a href="{{route('order')}}" class="nav-link {{(explode('.',$route)[0] == 'order') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>            
                            Order Management
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>