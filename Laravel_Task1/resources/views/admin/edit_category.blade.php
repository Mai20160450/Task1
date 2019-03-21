@extends('admin.index')
@section('content')


<section class="content-header">
      <h1>
        <i class="fa fa-edit"></i>
        Edit Category
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Categories</li>
      </ol>
    </section>
    <section>

<div class="content"> 
  <form method="post">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Category Name</label>
      <input type="text" class="form-control" value="{{$data->name}}" name="name" placeholder="Enter Category Name">
    </div>
    

    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Edit</button>
  </form>
</div>
</section>

@endsection