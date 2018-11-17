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
<h2>TimeLine</h2>
        <div class="box-inner">
            <div class="box-content">
                <center>
                    <br>
          		<form class="form" enctype="multipart/form-data" method="POST">
          			{{ csrf_field() }}

          				<div class="form-group">
                            <label for="image">Select Image</label><input id="image" type="file" name="image[]"/>
          				</div><br>
                        <div class="form-group">
                               <label for="details">Details</label>
                               <textarea id="details" class="form-control" name="details" placeholder="Enter Article Details....."></textarea>
                           </div>

          				<div class="form-group">
                            <br>
          					<button type="submit" class="btn btn-success">Upload</button>
          				</div>

          		</form>
                <br><br><br>
                <h2>Timeline Article Upload</h2><hr>
                    <table class="table table-bordered table-striped ">
                       @foreach($img as $image)
                                <div class="item">

                                       <a class="fancybox" rel="ligthbox" target="_blank" href="{{asset($image->image)}}">

                                      <img src="{{asset($image->image)}}" class="img-responsive" width="200px" alt="" />

                                     </a>
                                    <!-- fancybox End -->
                                </div>

                                <div class="tab">
                                        {{$image->details}}
                                </div>
                                <br><br>

                                        <a id="delete-button" href="{{ url('admin/upload/delete/' . $image->id) }}" class="btn btn-danger remove"> <i class="glyphicon glyphicon-trash"></i> Delete</a>
                                        <br>
                          </tr><br><br>
                          @endforeach

                    </table>
                 <br><br><br>
              </div>
         </div>
     </div>
</div>

@endsection
