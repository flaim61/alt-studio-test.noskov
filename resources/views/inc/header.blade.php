@section('header')

<header>
	<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
		<div class="container-fluid">
		  <a class="navbar-brand" href="#">MapPoints</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="{{ route('home') }}">Главная</a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="{{ route('about') }}">О нас</a>
		      </li>
		      <li class="nav-item active">
		        <a class="nav-link" href="{{ route('contact') }}">Обратная связь</a>
		      </li>
		    </ul>
				@guest('web')
				<form class="form-inline my-2 my-lg-0">
					<button class="btn btn-outline-warning my-2 my-sm-0 mr-3" type="submit" id='signinButton'>Зарегистрироваться</button>
		      <button class="btn btn-outline-success my-2 my-sm-0" id='loginButton' type="submit">Войти</button>
				</form>
				@endguest
				@auth('web')
		    <form class="form-inline my-2 my-lg-0" method="POST" action="{{ route('logout') }}">
						@csrf
			  		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Выйти</button>
				</form>
				@endauth
		  </div>
		</div>
	</nav>
</header>
