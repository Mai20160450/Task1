@extends('admin.index')
@section('content')
<section class="content-header">
      <h1>
      	<i class="fa fa-list"></i>
        Categories
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Categories</li>
      </ol>
    </section>
    <section>


<div class="content">
  
	<table class="table  table-bordered">
  <thead class="thead-dark" >
    <tr>
      <th scope="col" style="background: #222d32;color: #fff">id</th>
      <th scope="col" style="background: #222d32;color: #fff">Category</th>
      <th scope="col" style="background: #222d32;color: #fff"></th>
    </tr>
  </thead>
  <tbody>

  	@foreach($all_cats as $cat)
        <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td>
                <a href="{{aurl('edit_category/'.$cat->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                <a href="{{aurl('delete_category/'.$cat->id)}}"><button type="button" class="btn btn-danger">Delete</button></a>
                <a href="{{aurl('show_category/'.$cat->id)}}"><button type="button" class="btn btn-success">Show</button></a>
                                
             </td>
        </tr>
    @endforeach

    
  </tbody>
</table>

</div>

</section>
@endsection