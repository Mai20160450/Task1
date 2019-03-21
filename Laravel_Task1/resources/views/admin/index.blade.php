@include('admin.layouts.header')
@include('admin.layouts.nav')



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
        	@include('admin.layouts.message')
    	@yield('content')
    
    <!-- /.content -->
  </div>

@include('admin.layouts.footer')