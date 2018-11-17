@extends('admin.layouts.adminapp')

@section('content')
<h2>Edit Product</h2>
        <div class="box-inner">
            <div class="box-content">
                <form class="form"  action="{{ url('admin/product/edit/'.$product->id) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <label for="post_title">Product Name</label>
                            <input type="text" class="form-control" name="name" value="{{$product->name}}"  placeholder="Enter Product Name"> <br>
                        </div>
                        <div class="form-group">
                            <label for="post_title">Product prise</label>
                            <input type="text" class="form-control" name="prise" value="{{$product->prise}}"  placeholder="Enter prise"> <br>
                        </div>
                        <div class="form-group">
                            <label for="post_title">Product Code</label>
                            <input type="text" class="form-control" name="product_code" value="{{$product->product_code}}" placeholder="Enter Product Code"><br>
                        </div>


                        <div class="form-group" >
                            <label for="post_body">Select Category </label>
                            <select  class="select2 form-control" name="category_id">
                            @foreach($categorys as $category)
                                @if($category->id == $product->category_id)
                                    <option value="{{ $category->id }}" selected >{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach

                        </select>
                        </div>


                            <br><br>
                        <div class="form-group" >
                          <div class="row">
                                  <div class="col-sm-9">
                                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                                        <label for="post_body">Select Image</label>
                                              <input type="file" class="form-control" name="product_img"  id="profile-img"><br>

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
                                      <div class="col-sm-3">
                                          <img src='{{ asset("product_image/$product->product_img") }}' id="profile-img-tag"  width="200px" class="center" style="width:200px; height:200px; "/>

                                      </div>
                              </div>
                        </div>
                            <br>


                    <button type="submit" class="btn btn-primary"></i>Update Product</button><br><br>

                                <br><br><br>

            </form>

            </div>
        </div>
    </div>
    </div>
@endsection
