
@extends('layouts.app')

@section('content')

<style>
  .container{
    display: flex;
    justify-content: center;
    width: 500px;
    padding: 50px;
  }
</style>

<div class="container border shadow rounded">
  
@if(Session::has('msg'))
<div class="alert alert-success">{{Session::get('msg')}}</div>
@endif
    <form method="post" action="/updatecate">
        @csrf()
        <h5>Edit Asset type</h5><br>
        <div class=" form-group m-auto">
      Asset name <input type="text" class="form-control" name="name" value="{{$data->name}}"/>
      @if($errors->has('name'))
      <label class="text-danger">{{$errors->first('name')}}</label>
      @endif
      </div>
      <br>
      <div class=" form-group m-auto ">
    Description <textarea class="form-control" name="desc">{{$data->description}} </textarea>
    @if($errors->has('desc'))
      <label class="text-danger">{{$errors->first('desc')}}</label>
      @endif
      </div>
      <input type="hidden" name="uid" value="{{$data->id}}"/>
      <div class="text-center mt-2">
    <input type="submit" class="btn btn-success" value="update"/>
      </div>
    </form>

</div>
@endsection