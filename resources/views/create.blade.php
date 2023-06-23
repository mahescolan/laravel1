@extends('layout.master')
@section('title,list')
@section('body-content')

@if(session()->has('flase_message'))
 <p>{{ session()->get('flase_message') }}</p>
@endif
<div class="container mt-3">
  <h2>Stacked form</h2>
  <form action="{{route('store')}}" method="post">
    @csrf()
    <div class="mb-3 mt-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{old('name')}}">
      @if($errors->has('name'))
      <p class="text-danger">{{$errors->first('name')}}</p>
      @endif
    </div>
    <div class="mb-3">
      <label for="address">Address</label>
      <input type="textarea" class="form-control" id="address" placeholder="Enter address" name="address" value="{{old('address')}}">
      @if($errors->has('address'))
      <p class="text-danger">{{$errors->first('address')}}</p>
      @endif
    </div>
    <div class="mb-3 mt-3">
    <label for="status">Status</label><br>
    @if($errors->has('status'))
      <p class="text-danger">{{$errors->first('status')}}</p>
      @endif
    <input type="radio" id="act" name="status" value="0" >
      <label for="active">Active</label><br>
      <input type="radio" id="inact" name="status" value="1">
      <label for="active">Inactive</label><br>
      <div class="mb-3 mt-3">
      <label for="birthday">DOB</label>
      <input type="date" id="dateofbirth" name="dob" value="{{old('dob')}}"><br><br>
      @if($errors->has('dob'))
      <p class="text-danger">{{$errors->first('dob')}}</p>
      @endif
      
    </div>
    <button type="submit" class="btn btn-outline-primary">Submit</button>
    <a href="{{route('emp_details')}}"><input type="button"class="btn btn-outline-info" value="Back"></a>
  </form>
</div>

@endsection