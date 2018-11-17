@extends('admin.layouts.adminapp')
@section('content')
<style media="screen">
#popup {
    display: none;
}

.closeon {
  color:black;
  position: absolute;
  top: 0;
  right: 0;
  width:13px;
  height: 13px;
  text-align:center;
  border-radius:50%;
  font-size: 10px;
  cursor: pointer;
      background-color: #FFF

}
</style>

  <div class="box-inner">
      <div class="box-content">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                         Calender
                    </div>
                          <br>
                            <div id='calendar' ></div>
                      <!-- Edit Event Start -->
                            <div class="modal fade" id="calendarModal" >
                                  <div class="modal-dialog"><br><br>

                                  <div class="modal-content">

                                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                                          <br>
                                              <input type="hidden" class="form-control" name="" id="eventid" value="">
                                          <label for="title">Description</label>
                                          <input type="text" id="title" class="form-control" name="title" value="">

                                          <br>
                                        <center>
                                          <button type="button" class="btn btn-primary save"  data-dismiss="modal">Update</button>
                                          <button type="button" class="btn btn-danger delete"  data-dismiss="modal">Delete</button>
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </center>
                                  </div>
                                </div>
                              </div>
                              <!-- Edit Event End -->
                        </div>
                      </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                                var calendar = $('#calendar').fullCalendar({
                                header:{
                                 left:'prev,next today',
                                 center:'title',
                                 right:'month,agendaWeek,agendaDay'
                                },

                                selectable:true,
                                selectHelper:true,
                                eventRender: function(event, element){
                                    element.popover({
                                        animation:true,
                                        delay: 300,
                                        content: 'Description    :  ' +event.title,
                                        trigger: 'hover'
                                    });
                                  },
                                events :[

                                       @foreach($tasks as $task)
                                       {
                                           eventid: '{{ $task->id }}',
                                           title: '{{ $task->title }}',
                                           date : '{{ $task->date }}',
                                       },
                                       @endforeach
                                     ],
                                      eventColor: '#2fa4e7',
                                      select: function(date,start, end, allDay)
                                       {

                                        var url    = "{{ URL::to('/') }}/admin/calendar";
                                        var title = prompt("Enter Event Title");
                                        var date = moment(date, 'DD.MM.YYYY').format('YYYY-MM-DD');
                                        if(title)
                                        {

                                           $.ajax({
                                            url:url,
                                            type:"POST",
                                            data:{title:title,date:date},
                                            success:function(data)
                                            {
                                              $('#calendar').fullCalendar('addEventSource',data);
                                              swal("ADDED", "Added Successfully!", "success");
                                              	window.location.reload();
                                            }
                                       })
                                     }
                                   },
                                   editable: true,
                                   eventClick: function(calEvent, jsEvent, view ) {
                                     $('#title').val(calEvent.title);
                                     $('#eventid').val(calEvent.eventid);
                                     $('#calendarModal').modal();
                                      var url   = "{{ URL::to('/') }}/admin/calendar/edit";
                                         $(document).on('click','.save', function() {
                                                       $.ajax({
                                                           type: "POST",
                                                           url: url,

                                                           data:{
                                                             '_token': $('input[name=_token]').val(),
                                                             'eventid': $('#eventid').val(),
                                                             'title': $('#title').val()
                                                           },
                                                           success:function(data)
                                                           {
                                                             $('#calendar').fullCalendar('refetchEvent');
                                                             swal("Updated", "Updated Successfully!", "success");
                                                             	window.location.reload();
                                                           }
                                                       });
                                                   });

                                                   $(document).on('click','.delete', function() {

                                                     $('#eventid').val(calEvent.eventid);
                                                      var url   = "{{ URL::to('/') }}/admin/calendar/delete";
                                                     $.ajax({
                                                         type: "post",
                                                         url: url,
                                                         data:{
                                                            '_token': $('input[name=_token]').val(),
                                                           'eventid': $('#eventid').val()
                                                         },
                                                         success:function(data)
                                                         {
                                                            $('#calendar').fullCalendar('refetchEvent');
                                                           swal("Removed", "removed Successfully!", "success");
                                                           	window.location.reload();
                                                         }
                                                       });
                                                     });
                                          // change the border color just for fun
                                          $(this).css('border-color', 'red');
                                      }

                                 });
                               });

                    </script>
@endsection
