@extends('layouts.app')

@section('title')<title>Главная страница</title>@endsection

@section('content')



<div class="text-center mb-5">
	<h1>
		MapPoints
	</h1>
</div>

@auth('web')

<div class="row mb-5">
	<div class="col-12 col-sm-12 col-md-8 col-lg-8">
		<div class="map w-100" id='map'>
		</div>
	</div>
	<div class="col-12 col-sm-12 col-md-4 col-lg-4">
		<div class="p-3 map-form w-100 border rounded mb-4">
			<form action='{{ route('pointadd') }}' method="post">
				@csrf
			  <fieldset class="form-group">
			    <label for="name">Название точки на карте</label>
			    <input type="text" class="form-control" name='name' placeholder="Название">
			  </fieldset>
				<fieldset class="form-group">
			    <label for="width">Ширина</label>
			    <input type="text" class="form-control" name='width' placeholder="Ширина">
			  </fieldset>
				<fieldset class="form-group">
			    <label for="long">Долгота</label>
			    <input type="text" class="form-control" name='long' placeholder="Долгота">
			  </fieldset>
			  <button type="submit" class="btn btn-primary">Добавить</button>
			</form>
		</div>
		<div class="map-points w-100">
			@foreach($pointsData as $point)
				<div class="card mt-3 point-card" onclick="setPoint({{ $point->longitude }}, {{ $point->latitude }}, '{{ $point->name }}')">
				 <div class="card-body">
					 <h5 class="card-title">{{ $point->name }}</h5>
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon3">Долгота</span>
						  </div>
						  <input type="text" class="form-control" id='long-{{ $point->id }}' name='long' onchange="pointsChange({{ $point->id }})"  value='{{ $point->longitude }}'>
						</div>
 						<div class="input-group mb-3">
 						  <div class="input-group-prepend">
 						    <span class="input-group-text" >Ширина</span>
 						  </div>
 						  <input type="text" name='width' id='width-{{ $point->id }}' class="form-control" onchange="pointsChange({{ $point->id }})" value='{{ $point->latitude }}'>
 						</div>
					 <div class="d-flex">
						 <form action="/point/delete/{{ $point->id }}" method="post">
	 						 @csrf
	 						 <button type="submit" class="btn btn-danger">Удалить</button>
	 					 </form>
						 <form action="/point/update/{{ $point->id }}" class="d-none ml-3" method="post" id='points-update-{{ $point->id }}'>
							 @csrf
							 <input type="hidden" name="long" id='long-hidden-{{ $point->id }}' value="">
							 <input type="hidden" name="width" id='width-hidden-{{ $point->id }}' value="">
							 <button type="submit" class="btn btn-warning">Обновить</button>
						 </form>
					 </div>
				 </div>
				</div>
			@endforeach
		</div>
	</div>
</div>
@endauth

<div class="text-center mb-4">
	<h3>
		Что говорят о нас наши пользователи:
	</h3>
</div>
@if(count($messageData) == 0)
	<div class="toast border text-center mb-3 p-3 rounded" role="alert" aria-live="assertive" aria-atomic="true">
	<div class="toast-header">
		<strong class="me-auto">Пока что нет отзывов</strong>
	</div>
	<div class="toast-body">
		 Будьте первым, кто <a href='{{ route('contact') }}'>оставит отзыв </a>!
	</div>
</div>
@endif
@foreach($messageData as $message)
<div class="toast border text-center mb-3 p-3 rounded" role="alert" aria-live="assertive" aria-atomic="true">
<div class="toast-header">
	<strong class="me-auto">{{ $message->name }}</strong>
	<small class="text-muted">{{ $message->created_at }}</small>
</div>
<div class="toast-body">
	{{ $message->message }}
</div>
</div>
@endforeach


@endsection
