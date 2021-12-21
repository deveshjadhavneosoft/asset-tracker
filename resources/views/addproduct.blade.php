
@extends('layouts.app')

@section('content')
<style>
  .container{
    display: flex;
    justify-content: flex-start;
   padding: 50px;
    width: 500px;
  }
</style>

<div class="container border rounded shadow">
@if(Session::has('msg'))
<div class="alert alert-danger">{{Session::get('msg')}}</div>
@endif
    <form method="post" action="insertpro" enctype="multipart/form-data">
    <h2 class="text-center text-primary">Add Asset</h2>
        @csrf()
        <div class=" form-group m-auto ">
      Asset name <input type="text" class="form-control" name="name"/>
      @if($errors->has('name'))
      <label class="text-danger">{{$errors->first('name')}}</label>
      @endif
      </div>
      <br>
      

      <div class="">
        @php
        function unique_code($limit)
         {
           return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
         }
          @endphp
            Asset Code
          <input id="code" type="text" class="form-control " name="code" value="@php echo unique_code(16); @endphp" readonly>  
          </div>
                            
      <br>
      <div class=" form-group m-auto ">
          Asset Type
      <select name="category" class="form-control">
      <option>Asset Type</option>
        @foreach($data as $i)
        <option value="{{$i->id}}">{{$i->name}}</option>
        @endforeach
        @if($errors->has('category'))
      <label class="text-danger">{{$errors->first('category')}}</label>
      @endif
      </select>
      </div>
      <br>
      <div class=" form-group m-auto ">
      Quantity <input type="number" class="form-control" name="quantity"/>
      @if($errors->has('quantity'))
      <label class="text-danger">{{$errors->first('quantity')}}</label>
      @endif
      </div>
      <br>
      <div class=" form-group m-auto ">
      <h6> status</h6>
      </div>
      <div class=" form-group m-auto ">
      <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="status" value="1">Active
  </label>
</div>
<br>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="status" value="0">Inactive
  </label>
</div>
@if($errors->has('status'))
      <label class="text-danger">{{$errors->first('status')}}</label>
      @endif
      </div>
      <br>
      <div class=" form-group m-auto ">
      Image <input type="file" class="form-control" name="image"/>
      @if($errors->has('image'))
      <label class="text-danger">{{$errors->first('image')}}</label>
      @endif
      </div>
      <div class="text-center mt-2">
    <input type="submit" class="btn btn-success" value="submit"/>
      </div>
    </form>

</div>
@endsection