@extends('admin.layouts.main')

@section('title')
    <title>Add New Product</title>
@endsection

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add New Product</h1>
  </div>
  <div class="mb-3">
    <form action="{{ url('/barang/store') }}" method="post">
        @csrf
   <label for="name" class="form-label">Product Name</label>
   <input type="text" name="name" class="form-control" id="name" placeholder="Product Name">
   <div class="mb-3">
     <label for="exampleFormControlTextarea1" class="form-label">Description</label>
     <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4"></textarea>
   </div>
   <label for="price" class="form-label">Price</label>
   <input type="text" name="price" class="form-control" id="price" placeholder="Price">
   {{-- <label for="category_id" class="form-label" name="category_id">Categories</label> --}}
   {{-- <select class="form-select" name="category_id" aria-label="Default select example" >
   <option selected>- - Kategori - -</option>
   <option value="1">History</option>
   <option value="2">Religion</option>
   <option value="3">Science</option>
 </select> --}}
   {{-- <label for="user_id" class="form-label">Author</label> --}}
   {{-- <input type="hidden" name="user_id" class="form-control " id="user_id" placeholder="Author" value="{{ auth()->user()->id }}"> --}}
   <!-- <label for="exampleFormControlInput1" class="form-label"></label>
   <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title"> -->
 </div>
 <div class="mb-3">
   <label for="formFile" class="form-label">Choose Pict</label>
   <input class="form-control" name="image" type="file" id="formFile">
 </div>
 <a href="{{ url('/dashboard/posts') }}" class="btn btn-danger">Back</a>
 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
 </form>
@endsection
