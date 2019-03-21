@extends('admin.index')
@section('content')
<section class="content-header">
      <h1>
      	<i class="fa fa-eye"></i>
        Show Categories
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Categories</li>
      </ol>
    </section>
    <section>


<div class="content">
	<h3>Category Name : <label>{{$data->name}}</label></h3>

</div>

</section>
@endsection