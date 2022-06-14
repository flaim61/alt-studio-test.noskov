@extends('layouts.app')

@section('title')<title>Главная страница</title>@endsection

@section('content')
<div class='container'>
  <form action="{{ route('contact-form') }}" method="post">
    @csrf
    <h1>
      Обратная связь
    </h1>
    <p>
      Расскажите о вашем опыте работы в приложении.
    </p>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" name='email 'class="form-control" id="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Ваше имя</label>
      <input type="text" name='name' class="form-control" id="name">
    </div>
    <div class="mb-3">
      <label for="message" class="form-label">Ваше сообщение</label>
      <textarea name="message" id="message" class="form-control"></textarea>
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" name='contactCheck' id="contactCheck">
      <label class="form-check-label" for="contactCheck">Соглашаюсь на обработку персональных данных</label>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
  </form>
</div>
@endsection
