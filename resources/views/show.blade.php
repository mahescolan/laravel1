@extends('layout.master')
@section('title,list')
@section('body-content')

<div class="container mt-3">
<h2>show</h2> 
  <a href="{{route('user.create')}}">create</a>
<div class="table">
        name:{{$user->name}}
        <br>
        address:{{$user->address}}
        <br>
        status:{{$user->status}}
        <br>
        dob:{{$user->dob}}
        <br>
    </div>
</body>
</html>