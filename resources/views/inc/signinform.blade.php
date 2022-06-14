@section('signinform')

<div class="modal fade" id="signinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal"  id='hideSigninButton' aria-label="Close">&#65794;</button>
      </div>
      <div class="modal-body">
        <form action='{{ route('useradd') }}' method="post">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Имя пользователя</label>
            <input type="text" class="form-control" name='name'>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name='email'>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" name='password'>
          </div>
          <div class="mb-3">
            <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
            <input type="password" class="form-control" name='password_confirmation'>
          </div>
          <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
      </div>
    </div>
  </div>
</div>
