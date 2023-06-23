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
        created_id:{{$user->created_id}}
</div>
</body>
</html>