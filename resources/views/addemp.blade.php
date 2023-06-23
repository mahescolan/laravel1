@extends('layout.master')
@section('title,list')
@section('body-content')

<div class="container mt-3">
  <h2>Stacked form</h2>
  @if(session()->has('flase_message'))
 <p>{{ session()->get('flase_message') }}</p>
@endif
<div class="container mt-3">
  
  <form action="{{route('user.add')}}" method="post">
   @csrf()
    <div class="mb-3 mt-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="">
      @if($errors->has('name'))
      <p class="text-danger">{{$errors->first('name')}}</p>
      @endif
    </div>
    <div class="mb-3">
      <label for="address">Address</label>
      <input type="textarea" class="form-control" id="address" placeholder="Enter address" name="address" value="">
      @if($errors->has('address'))
      <p class="text-danger">{{$errors->first('address')}}</p>
      @endif
    </div>
    <div class="mb-3 mt-3">
    <label for="cars">Created_id</label>
   <select name="created_id" id="create">
   <option value="choose">choose</option>
   @foreach($e as $value)
    <option value="{{$value->id}}">{{$value->name}}</option>
     @endforeach
    </select>
   
    </div>

    <button type="submit" class="btn btn-outline-primary">submit</button>
    <a href="{{route('emp_details')}}"><input type="button"class="btn btn-outline-info" value="Back"></a>
  </form>
</div>

@endsection
</body>
</html>