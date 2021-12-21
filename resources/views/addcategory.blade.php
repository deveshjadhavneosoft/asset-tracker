
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
<div class="container border rounded shadow">
    <form method="post" action="insertcate">
    <h2 class="text-center text-primary">Add Asset type</h2>
        @csrf()
        <div class=" form-group m-auto ">
      Asset name <input type="text" class="form-control" name="name"/>
      @if($errors->has('name'))
      <label class="text-danger">{{$errors->first('name')}}</label>
      @endif
      </div>
      <br>
      <div class=" form-group m-auto ">
    Description <textarea class="form-control" name="desc"> </textarea>
    @if($errors->has('desc'))
      <label class="text-danger">{{$errors->first('desc')}}</label>
      @endif
      </div>
      <div class="text-center mt-2">
    <input type="submit" class="btn btn-success" value="submit"/>
      </div>
    </form>

</div>
@endsection