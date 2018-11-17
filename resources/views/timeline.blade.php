@extends('layouts.app')
@section('content')
<style>
ul.timeline {
    list-style-type: none;
    position: relative;
    padding: in  ;
}
ul.timeline:before {
    content: ' ';
    background: #000000;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;

}
ul.timeline > li {
    margin: 20px 0;
    padding-left: 20px;
    background-color: #e3f6f9;
    border-radius: 115px;

}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #22c0e8;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}
</style>
<center><h2>WELCOME TO NEWS FEED</h2></center>
<div class="container mt-5 mb-5">
	<div class="row">
		<div class="col-md-12 offset-md-3">

      <ul class="timeline">
        @foreach($img as $image)
				<li>
          <center>
            <a class="" rel="" href="{{asset($image->image)}}" target="_blank">
              <img src="{{asset($image->image)}}" class="" width="250px" height="250px" alt="" />
            </a>
          </center>
          <font size="3" color="black">{{$image->details}}</font><br><br>
          <div class="pull-right">
            {{$image->created_at}}
                 <div class="fb-like" data-href="https://www.facebook.com/CRM-485449418517218/?modal=admin_todo_tour" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
                 <div id="fb-root"></div>
                     <script>
                         (function(d, s, id) {
                           var js, fjs = d.getElementsByTagName(s)[0];
                           if (d.getElementById(id)) return;
                           js = d.createElement(s); js.id = id;
                           js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12';
                           fjs.parentNode.insertBefore(js, fjs);
                         }(document, 'script', 'facebook-jssdk'));
                   </script>
          </div>
				</li>

        @endforeach
        <br><br><br>
			</ul>
		</div>
	</div>
</div>
@endsection
