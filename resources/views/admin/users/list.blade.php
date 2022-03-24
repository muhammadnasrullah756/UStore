@extends('admin.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users List</h1>
  </div>

  <div class="table-responsive col-lg-8">
      {{-- <a href="/dashboard/posts/create" class="btn btn-info mb-3">Add New Book</a> --}}
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">No Telepon</th>
          <th scope="col">Address</th>
          <th scope="col">Roles</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)

        <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->no_telp }}</td>
        <td>{{ $user->address }}</td>
        <td>{{ $user->roles }}</td>
        <td>
             <button class="border-0">
             {{-- <a href="/dashboard/posts/{{ $post->id }}"> --}}
             {{-- <a href={{ url('dashboard/posts/'. $user->id) }}>
             <span data-feather="eye"></span></a></button> --}}
             <button class="border-0">
             <a href={{ url('users/edit/'. $user->id ) }}>
             <span data-feather="edit"></span></a></button>
             <form action="{{ url('users/delete/'.$user->id) }}" method="post" class="d-inline">
             @method('delete')
             @csrf
             <button class="border-0" onclick="return confirm('Are u Sure?')"><span data-feather="trash-2"></span></button>
             </form>

         </td>
       </tr>

       @endforeach
    </tbody>
</table>
</div>

@endsection
