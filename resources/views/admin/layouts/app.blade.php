 @include('admin.layouts.head')

 <body class="hold-transition sidebar-mini layout-fixed">
     <div class="wrapper">

         <!-- Preloader -->
         <div class="preloader flex-column justify-content-center align-items-center">
             <img class="animation__shake" src="{{ url('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60"
                 width="60">
         </div>
         @include('admin.layouts.navbar')

         <!-- Main Sidebar Container -->
         <aside class="main-sidebar sidebar-dark-primary elevation-4">
             <!-- Brand Logo -->
             <a href="index3.html" class="brand-link text-center">
                 {{-- <img src="" alt="AdminLTE Logo" class="brand-image img-circle" style="opacity: .8"> --}}
                 <span class="brand-text font-weight-light">ADMIN PANEL</span>
             </a>

             <!-- Sidebar -->
             <div class="sidebar">
                 <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                     <div class="image">
                         <img src="{{ url('dist/img/user.png') }}" class="img-circle elevation-2" alt="User Image">
                     </div>
                     <div class="info">
                         <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                     </div>
                 </div>
                 <div class="form-inline">
                     <div class="input-group" data-widget="sidebar-search">
                         <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                             aria-label="Search">
                         <div class="input-group-append">
                             <button class="btn btn-sidebar">
                                 <i class="fas fa-search fa-fw"></i>
                             </button>
                         </div>
                     </div>
                 </div>
                 @include('admin.layouts.menu')
             </div>
         </aside>

         <div class="content-wrapper">


             @yield('content')
         </div>
         @include('admin.layouts.footer')
