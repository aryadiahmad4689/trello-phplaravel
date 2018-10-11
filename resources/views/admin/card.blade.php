@extends('admin.layout.main')

@section('title')
@section('keyword')
@section('description')
 @section('content')

<div class="container">

<h1 class="text-center">Buat Board</h1>
	
				<div class=" col-md-12">
		<div class="row">
			<div class="form-group col-md-4 text-center">
			<form action="" method="post">
					{{csrf_field()}}
				<input type="text" name="title" class="form-control" placeholder="masukkan nama list anda">
				<button type="submit" class="btn btn-success form-control">Post</button>
			</form> 
			</div>
		</div>
			</div>

	@endforeach
</div>

		
	



 @endsection