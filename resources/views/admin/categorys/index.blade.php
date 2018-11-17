@extends('admin.layouts.adminapp')
@section('content')
<div class="box-content alerts">

        @if(Session::has('flash_message'))
               <div class="alert alert-success">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                   {!! session('flash_message') !!}<strong> Well done!</strong>
               </div>
         @endif

</div>
<h2>Category Details</h2>

        <div class="box-inner">
            <div class="box-content">
                    <form method="post" class="form" for="cat" action="{{ url('admin/category/deleteall')}}">{{  csrf_field() }}
                        <br>
                      <div class="row ">
                         <div class="col-sm-2">
                           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Create Category </button>
                         </div>
                           <div class="col-sm-2">
                             <button type="submit"class="btn btn-danger waves-effect waves-light remove pull-left" >Delete All Selected</button>
                           </div>

                      </div>

                    <br><br>
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                       <thead>
                           <tr>
                               <th>All<br><INPUT type="checkbox" name="delete_id[]" onchange="checkAll(this)" /></th>
                               <th >Id</th>
                               <th >Category</th>

                                 <?php
                                     $company = App\setting::where('key','company_options')->first();
                                 ?>
                                 @if($company->value==1)
                                  <th>
                                            Company
                                  </th>
                                  @endif

                               <th >Created at</th>
                               <th >Action</th>
                           </tr>
                       </thead>
                       @foreach($categorys as $category)
                           <tr>
                               <td>
                                   <INPUT type="checkbox" name="delete_id[]"  value="{{$category->id}}" />
                               </td>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $category->name }}</td>

                               <?php
                                   $company = App\setting::where('key','company_options')->first();
                               ?>
                                @if($company->value==1)
                               <td>{{(isset( $category->company->name ))? $category->company->name : ""}}</td>
                               @endif

                               <td>{{ $category->created_at }}</td>
                               <td>
                                   <a href="{{ url('admin/category/edit/' . $category->id) }}"class="btn btn-success" ><i class="fa fa-edit" aria-hidden="true"></i></a>

                                   <a href="{{ url('admin/category/delete/' . $category->id)}}"class="btn btn-danger waves-effect waves-light remove" >
                                   <i class="glyphicon glyphicon-trash" aria-hidden="true" ></i> </a>
                               </td>
                           </tr>
                       @endforeach
                       </tbody>
                   </table>
                </form>

                <form  id="clear" method="post">
                  {{  csrf_field() }}
                  <div class="modal fade col-sm-12" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content col-sm-12">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">×</button>
                              <font size="5">Create Category</Font>
                            </div>
                              <?php
                                  $company = App\setting::where('key','company_options')->first();
                              ?>
                                @if($company->value==1)
                                <label for=""> Select Company :</label>
                                    <div class="">
                                        <select  class="select2 form-control"  id="company_id" name="company_id">
                                            @foreach($companys as $company)
                                                <option  value="{{ $company->id }}" >{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            <!-- Add Company End -->
                            @if ($errors->any())
                                <div class="alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <br>
                            <!-- Add Category start -->
                            <div class="form-body">
                                <label for="post_title">Category Name &nbsp: </label>
                                <input type="text" class="form-control" name="name" value="" id="name" placeholder="Enter Category Name"><br>
                            </div>
                            <!-- Add category End -->

                            <button type="button" name="button" class="btn btn-primary btn-save " ><i class="fa fa-plus" aria-hidden="true"></i>Add Category</button>

                          </div>
                      </div>
                  </div>
                </form>

                <script type="text/javascript">
                $(document).on('click','.btn-save', function() {

                              var url       = "{{ URL::to('/') }}/admin/categorys";
                              var $cate     = {};
                              $cate.name = $('#name').val();
                              $cate.company_id = $('#company_id').val();
                              if($cate.name != '' && $cate.company_id != '') {
                              $.ajax({
                                  type: "POST",
                                  hide: "fade",
                                  url: url,
                                  data: $cate,'csrfToken' => csrf_token(),

                                  dataType: 'json',
                                  cache: false,
                                  success: function(data){

                                    if(data == 1) {
                                      swal("ADDED", "Added Successfully!", "success");
                                      $(".modal").modal('hide');
                                      document.getElementById('clear').reset();

                                    } else {
                                      swal("Oops", "We couldn't connect to the server!", "error");

                                      alert('something went wrong.');
                                    }
                                  }
                              });
                            } else {
                              swal("Oops", "Please fil up required fields", "error");


                            }
                          });
                </script>


                <script>
                    function checkAll(ele)
                     {
                        var checkboxes = document.getElementsByTagName('input');
                            if (ele.checked) {
                                for (var i = 0; i < checkboxes.length; i++)
                                 {
                                    if (checkboxes[i].type == 'checkbox')
                                     {
                                        checkboxes[i].checked = true;
                                    }
                                }
                            }
                            else
                             {
                                 for (var i = 0; i < checkboxes.length; i++)
                                  {
                                     console.log(i)
                                     if (checkboxes[i].type == 'checkbox')
                                      {
                                         checkboxes[i].checked = false;
                                       }
                                   }
                               }
                           }

                </script>
@endsection
