@extends('layout')
@section('content')


@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
@endif
<form action="/auth/authenticate" method=POST>
    @csrf
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Sign Up</button>
</form>

@endsection