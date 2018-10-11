@extends('admin.layout.main')

@section('title')
@section('keyword')
@section('description')
 @section('content')




<div class="container">
	<h3 class="text-center">{{$board->title_board}}</h3>
	<div class=" col-md-offset-3 col-md-5">
		<div class="row">
			<div class="form-group">
			<form action="{{route('create-post',$board->id)}}" method="post">
					{{csrf_field()}}
				<input type="text" name="title" class="form-control">
				<!-- <textarea name="body" rows="8" class="form-control"></textarea> -->
				<button type="submit" class="btn btn-success">Post</button>
			</form>
			</div>
		</div>
	</div>
</div>

<div class="container">
@foreach($board->posts as $post)
	<div class="row  col-md-offset-1 col-md-3">
		
			<form  method="post" action="{{route('delete-post',$post->id)}}">
						{{csrf_field()}}

					<h1 class="text-center">{{$post->title_post}}<button type="submit" class="btn-success btn-xs text-right" title="{{$post->id}}">x</button></h1>
					 {{ method_field('delete') }}
			
					
				</form>
			
			<div class="cards text-center">
				<div class="card-header">

					<form class="form-group" action="{{route('create-card',$post->id)}}" method="post">
						{{csrf_field()}}
						<input class="form-control" type="text" name="title" placeholder="Add card">
						<button type="submit" class="btn btn-success text-left form-control">Add card</button>
					</form>

				</div>
	@foreach($dataCard as $card)
	<div class="card-body">
		@if($card->post_id == $post->id) 
				<h5 class="card-title">
				{{$card->title_card}}
				<a href="{{ route('edit-card',$card->id)}}" class="btn btn-danger btn-xs">edit</a>
			<form method="post" action="">
						{{csrf_field()}}
				
							<div class="dropdown">
  								<button class="dropbtn">Dropdown</button>
  									<div class="dropdown-content">
					@foreach($dropdowns as $dropdown)
						@if($dropdown->title_post != $post->title_post)
   										 <a href="{{route('move.card',[$dropdown->id,$card->id])}}">{{$dropdown->title_post}}</a>
				 		@endif
				 	@endforeach
  									</div>
							</div>
	  			</select>
	  		</form>

			<form method="post" action="{{route('delete-card',$card->id)}}">
						{{csrf_field()}}
					<button type="submit" class="btn btn-success btn-sm btn-xss" title="{{$card->id}}">hapus</button>
					 {{ method_field('delete') }}
			</form>
				</h5>
		@endif
	</div>	
	@endforeach
	<div class="card-footer text-muted">
 			 </div>
	
		</div>
	</div>
@endforeach

</div>




 @endsection 