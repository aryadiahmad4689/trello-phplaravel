@extends('admin.layout.main')

@section('title')
@section('keyword')
@section('description')
 @section('content')




<div class="container">
	<h3 class="text-center">Edit Card</h3>
	<div class=" col-md-offset-3 col-md-5">
		<div class="row">
			<div class="form-group">
			<form action="{{route('update.card',$data->id)}}" method="post">
					{{csrf_field()}}
				<input type="text" name="title" class="form-control" value="{{$data->title_card}}">

	  				
				<!-- <textarea name="body" rows="8" class="form-control"></textarea> -->
				<button type="submit" class="btn btn-success">Post</button>
				{{method_field('put')}}
			</form>
			</div>
		</div>
	</div>
</div>


@endsection