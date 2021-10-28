@extends('layouts.admin')

@section('title')
Appointment Calendar
@endsection
@section('content')
@section('css')

<link rel="stylesheet" href="{{asset('assets/css/fullcalendar.css')}}"/>
<!--<link rel="stylesheet" href="{{asset('assets/css/fullcalendar.min.css')}}"/>-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" integrity="sha512-KXkS7cFeWpYwcoXxyfOumLyRGXMp7BTMTjwrgjMg0+hls4thG2JGzRgQtRfnAuKTn2KWTDZX4UdPg+xTs8k80Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
@endsection
<div class="wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

<!--Calendar-->
      <div class="card">
    <div class="card-body">
            <div class="container">
    <br />
    <h1 class="text-center text-primary">Dental Appointments Calendar</h1>
    <br />

    <div id="calendar"></div>

</div>
    </div>

   </div>

<br />
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@section('js')
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/js/fullcalendar.js')}}"></script>
<!--<script src="{{asset('assets/js/fullcalendar.min.js')}}"></script>-->
<script src="{{asset('assets/js/moment.js')}}"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js" integrity="sha512-o0rWIsZigOfRAgBxl4puyd0t6YKzeAw9em/29Ag7lhCQfaaua/mDwnpE2PVzwqJ08N7/wqrgdjc2E0mwdSY2Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
<script>
   $(document).ready(function () {
       $.noConflict();
       var Calendar = FullCalendar.Calendar;
       var calendarEl = document.getElementById('calendar');

       var calendar = new Calendar(calendarEl,{
           //plugins: [ listPlugin ],
            initialView: 'listDay',
          
           events: "{{route('calendar')}}",
          
           //editable: true,
            //currentTimezone: 'Europe/Manila',
            //timeFormat:'h(:mm)a',
            navLinks: true,
            eventLimit: true,
           
            //allDaySlot: false,
            //nextDayThreshold:'00:00 ',
            allDaySlot: true,
            weekends: false,
            displayEventTime: false,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listWeek',    //timeGridDay,agendaWeek,basicDay',

            }
       });
       calendar.render(); 

        /*$('#calendar').fullCalendar({
           /*views: {
               agendaDay: {
                   minTime: '00:00',
                   maxTime: '00:00',
               },
               agendaWeek: {
                   minTime: '00:00',
                   maxTime: '00:00',
               }
           },*/
         
          /* events: "{{route('calendar')}}",
           //editable: true,
            //currentTimezone: 'Europe/Manila',
            //timeFormat:'h(:mm)a',
            navLinks: true,
            eventLimit: true,
           
            //allDaySlot: false,
            //nextDayThreshold:'00:00 ',
            //allDay: true,
            //weekends: false,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaDay',//agendaWeek,basicDay',

            }
           
           
            
        });*/
   });

    
</script>
@endsection

@endsection
