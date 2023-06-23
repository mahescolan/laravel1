@extends('layout.master')
@section('title,list')
@section('body-content')

<div class="container mt-3">
  <h2>Employee List</h2>
  <a href="{{route('user.create')}}"><input type="button" class="btn btn-outline-info" value="create"></a>
  <a href="{{route('user.addemp')}}"><input type="button" class="btn btn-outline-secondary" value="Addemployee"></a>
  <a href="{{route('user.adddocument')}}"><input type="button" class="btn btn-outline-warning" value="Addempdocuments"></a>
  <a href="{{route('user.logout')}}"><input type="button" class="btn btn-primary btn-sm" value="Logout"></a><br><br>
  @if(session()->has('flase_msg'))
 <p>{{ session()->get('flase_msg')}}</p>
@endif
<div class="table">
  <table class="table table-bordered" id="select">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">address</th>
        <th scope="col">Status</th>
        <th scope="col">DOB</th>
        <th scope="col">Employee Name</th>
        <th scope="col">Action</th>
        <th scope="col">Emp Documents</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach($e as $user)
       
        <td>{{$user->name}}</td>
        <td>{{$user->address}}</td>
        @if($user->status==0)
        <td>active</td>
        @else
        <td>inactive</td>
        @endif
        <td>{{$user->dob}}</td>
        
        <!-- <td>{{isset($user->createdby->name) ? $user->createdby->name:'-'}}</td> -->
        <td>{{optional($user->createdby)->name ? optional($user->createdby)->name:'-'}}</td>
        <td>
        <a href="{{route('user.show',$user->id)}}"><input type="button"   class="btn btn-outline-primary" value="show"></a>
        <a href="{{route('user.edit',$user->id)}}"><input type="button"   class="btn btn-outline-success" value="Edit"></a>
        <form action="{{route('user.destroy',$user->id)}}" method="post">
        @csrf()
        @method('delete')
        <button type="submit" class="btn btn-outline-danger">Delete</button>
        </form>
        </td>
        <td><a href="{{route('user.dcshow',$user->id)}}"><input type="button"   class="btn btn-outline-primary" value="Docshow"></a></td>
       
      </tr>
    </tbody>
      @endforeach
  </table>
</div>
@endsection
</body>
</html>