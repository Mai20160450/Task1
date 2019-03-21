@extends('admin.index')
@section('content')

<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section>


<div class="content">
  <form method="post">
    @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Site Name</label>
      <input type="text" class="form-control" name="name" placeholder="siteName">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Email address</label>
      <input type="email" class="form-control" name="email" placeholder="Site Email Address">
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Site Keyword</label>
      <textarea class="form-control" name="keywords" placeholder="Site Keywords"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlInput1">Description</label>
      <textarea class="form-control" name="desc" placeholder="Site Description"></textarea>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Maintenance</label>
      <select class="form-control" name="maintenance">
        <option value="enabled">Enabled</option>
        <option value="disabled">Disabled</option>
      </select>
    </div>
    
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Maintenance Message</label>
      <textarea class="form-control" name="main_message" placeholder="Maintenance Message"></textarea>
    </div>
    <input type="submit" value="Send">
  </form>      
        
</div>     
</section>
 <!-- /.row (main row) -->
@endsection