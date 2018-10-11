@extends('admin.layout.main')

@section('title')
@section('keyword')
@section('description')
 @section('content')

 

<div class="container">

<h1 class="text-center">Buat Board</h1>
	
		<div class="row text-center">
			<div class=" col-md-12">
				<div class="form-group col-md-4 text-center">
					<form action="{{route('create-board')}}" method="post">
					{{csrf_field()}}
					<input type="text" name="title" class="form-control" placeholder="Insert new board">
					<button type="submit" class="btn btn-success form-control">Post</button>
				</form> 
				<hr>

			</div>
		</div>
			</div>
	<div class="row">
		<div class="col-md-12">

		@foreach($boards as $board)
			<div class=" row col-md-12">
			<h1 class="text-center"><a href="{{route('show-board-detail',$board->id)}}" class="text-center">{{$board->title_board}}</a></h1>
			</div>
		@endforeach

		</div>
	</div>

			</div>
@endsection