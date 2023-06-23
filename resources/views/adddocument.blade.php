@extends('layout.master')
@section('title,list')
@section('body-content')

<div class="container mt-3">
  <h2>Add documents</h2>
  @if(session()->has('flase_message'))
 <p>{{ session()->get('flase_message') }}</p>
@endif
<div class="container mt-3">
  
  <form action="{{route('user.docustore')}}" method="post">
   @csrf()
    <div class="mb-3 mt-3">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="">
      @if($errors->has('name'))
      <p class="text-danger">{{$errors->first('name')}}</p>
      @endif
    </div>
    <div class="mb-3 mt-3">
    <label for="worker_id">worker_id</label>
   <select name="worker_id" id="create">
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