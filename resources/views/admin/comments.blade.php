@extends('admin.layouts.adminapp')
@section('content')<section class="box-body">
    <h2>Comments Details</h2>
            <div class="box-inner">
                <div class="box-content">

                          <form  class="form" method="post">
                              {{ csrf_field() }}
                                 @foreach($comments as $comment)

                                     <br><br>
                                     <table class="table table-striped table-bordered bootstrap-datatable datatable responsive dataTable">
                                         <tr>
                                             <td>Name</td>
                                             <td>{{ $comment->name }}</td>
                                         </tr>
                                         <tr>
                                             <td>Comment</td>
                                             <td>{{$comment->comment}}</td>
                                         </tr>
                                            <td>Email</td>
                                             <td>{{$comment->email}}

                                                  <a id="delete-button" href="{{ url('admin/comments/delete/' . $comment->id) }}" class="btn btn-danger waves-effect waves-light remove pull-right"> <i class="glyphicon glyphicon-trash"></i> Delete</a>

                                             </td>

                                         </tr>

                                     </table>
                                 @endforeach

                             </form><br><br><br>
                        </div>
            </section>
        </section>
</div>

@endsection
