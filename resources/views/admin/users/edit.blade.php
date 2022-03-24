@extends('admin.layouts.main')

@section('title')
    <title>Update Users</title>
@endsection

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update Users</h1>
  </div>
  <form action="{{ url('/users/update/'.$user->id) }}" method="post">
  <div class="mb-3">

        @csrf
        {{-- @method('put') --}}
   <label for="name" class="form-label">Name</label>
   <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $user->name }}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{ $user->email }}">
    </div>
    {{-- <div class="mb-3">
        <label for="no_telp" class="form-label">No. Telepon</label>
        <input type="text" name="no_telp" class="form-control" id="no_telp" placeholder="085XXXXXXXXX">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" id="address" placeholder="Address">
    </div> --}}
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Password Confirmation</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password Confirmation">
    </div>
    <input type="hidden" id="roles" type="text" class="form-control" name="roles" value="buyer" required autocomplete="roles" autofocus>

 <a href="{{ url('/index') }}" class="btn btn-danger">Back</a>
 <button type="submit" name="submit" class="btn btn-info">Submit</button>
 </form>
@endsection



