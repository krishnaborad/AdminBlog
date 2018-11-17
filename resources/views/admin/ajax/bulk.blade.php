@extends('admin.layouts.adminapp')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

<div class="box-inner">
  <div class="box-content">
    {!! Form::open([ 'route' => [ 'dropzone.uploadfile' ], 'files' => true, 'class' => 'dropzone','id'=>"image-upload"]) !!}
    {!! Form::close() !!}

  </div>

</div>
<script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize  : 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif"
        };
</script>

@endsection
