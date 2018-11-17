@extends('admin.layouts.adminapp')
@section('content')

<h2>Create New Product</h2>
        <div class="box-inner">
            <div class="box-content">
                    <form class="form" action="{{ url('admin/product/create') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}


                            <br>
                        <div class="box-body">

                            <label for="post_title">Product Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" placeholder="Enter Product Name"> <br>
                        </div>
                        <div class="box-body">

                            <label for="post_title">Product Prise</label>
                            <input type="text" class="form-control" name="prise" value="{{ old('prise') }}" id="prise" placeholder="Enter Prise"> <br>
                        </div>
                         <!--  -->

                        <div class="box-body"{{ $errors->has('product_code') ? ' has-error' : 'enter' }}>

                            <label for="post_title">SKU</label>
                            <input type="text" class="form-control" name="product_code" value="{{ old('product_code') }}" placeholder="Enter Product Code"><br>

                        </div>

                        <br>
                        <div class="box-body">
                            <label for="box">Select Category </label>
                            <select  class="select2 form-control"  name="category_id">
                            @foreach($categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                            @endforeach
                            </select>
                        </div>
                        <div class="form-body">
                            <br>
                            <div class="row">

                            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                            <div class="col-sm-9">
                                <label for="">Select Image</label><br>
                                    <input type="file" class="form-control" name="product_img" id="profile-img"><br>

                                    <script type="text/javascript">
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();

                                                reader.onload = function (e) {
                                                    $('#profile-img-tag').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                        $("#profile-img").change(function(){
                                            readURL(this);
                                        });
                                    </script>

                                </div><br>
                                <div class="col-sm-3 ">


                                    <img src="{{url('default_product.jpg')}}" id="profile-img-tag" width="200px" class="pull-left" style="width:200px; height:200px;"/>

                                </div>
                              </div>
                            <br>
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add Product</button>
                            <br><br><br><br><br>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
