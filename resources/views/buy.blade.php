@extends('layouts.app')
@section('content')
<div class="container">

  <form class="form"  action="{{ url('admin/product/edit/'.$products->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <input type="text" name=""  class="form-control"value="{{$products->name}}" disabled>

  </form>
</div>
@endsection
