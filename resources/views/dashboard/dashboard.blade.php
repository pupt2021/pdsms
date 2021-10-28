@extends('layouts.admin')

@section('title')
Dashboard
@endsection
@section('content')
@push('css')
<link rel="stylesheet" href="{{asset('assets/css/fullcalendar.css')}}"/>

<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" integrity="sha512-KXkS7cFeWpYwcoXxyfOumLyRGXMp7BTMTjwrgjMg0+hls4thG2JGzRgQtRfnAuKTn2KWTDZX4UdPg+xTs8k80Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
@endpush
<div class="wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                 @if($medicines ==0) 
                <h3>{{"0"}}</h3>
               @endif
                @if($medicines!=0) 
                <h3>{{$medicines}}</h3>
               @endif

                <p>Medicines</p>
              </div>
              <div class="icon">
                <i class="ion ion-medkit"></i>
              </div>
              <a href="all-medicine" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                 @if($supply ==0) 
                <h3>{{"0"}}</h3>
               @endif
                @if($supply!=0) 
                <h3>{{$supply}}</h3>
               @endif
 
                <p>Supplies</p>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
              <a href="all-supply" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$users}}</h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
               @if($appointments ==0) 
                <h3>{{"0"}}</h3>
               @endif
                @if($appointments!=0) 
                <h3>{{$appointments}}</h3>
               @endif
               
                <p>Appointments</p>
              </div>
              <div class="icon">
                <i class="ion ion-calendar"></i>
              </div>
              <a href="appointments" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- /.content -->
    <!--bar chart-->
    <h5>Appointment Bar Chart</h5>
    <div style="height:400px;width:900px;margin:auto;">
        <canvas id="barChart"></canvas>

    </div>
    <br />
    <br />
    <br />
    <!--line graph-->
    <h5>Patient Line Graph</h5>
    <div id="chart-container"></div>
    <br />
    <br />
    <br />
  </div>

  <!-- /.content-wrapper -->

@section('js')

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
<!--<script src="https://code.highcharts.com/highcharts.js"></script>-->
<script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('assets/js/moment.js')}}"></script>
<script src="{{asset('assets/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/js/HighCharts.js')}}"></script>
<script>
   $(document).ready(function () {
   $.noConflict();     
          
       $(function () {
           var datas = <?php echo json_encode($datas); ?>;
           var barCanvas = $("#barChart");
           //var year = new Date().getFullYear();
           //console.log(year);
           var year = moment().format("YYYY");
           //var labels = "Appointments for " + year;
           //window.alert(year);
           var barChart = new Chart(barCanvas, {
               type: 'bar',
               data: {
                   labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                   datasets: [
                       {
                           label: "Appointment Growth, "+ year,
                           data: datas,
                           backgroundColor:['red','orange','yellow','green', 'blue', 'indigo', 'violet', 'purple', 'pink', 'silver', 'gold', 'brown']
                       }
                   ]
               },
               options: {
                   scales: {
                       yAxes: [{
                           ticks: {
                               beginAtZero: true
                           }
                       }]
                   }
               }
           })
       })
   });

     $(function () {
         var lineGraphData = <?php echo json_encode($datas)?>;
         var year = moment().format("YYYY");
         Highcharts.chart('chart-container', {
            chart: {
                 backgroundColor: '#f8f9fa',

             },
             credits: {
                enabled: false
              },
            title: {
                text:'Patient Growth, ' + year
            },
            subtitle: {
                text: 'Source: Patient and Dental Supply Monitoring System'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Number of Patients'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
            },
            plotOptions: {
                series: {
                    allowPointSelect:true
                }
            },
            series: [{
                name: 'Patients',
                data: lineGraphData
            }],
            responsive: {
                rules: [
                    {
                        condition: {
                            maxWidth: 500,
                            
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }
                ]
            }
        })
 });      


    /*$(document).ready(function () {

         $.ajaxSetup({
             headers:{
                 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
             }
         });*/

        /*$('#calendar').fullCalendar({
            events: "{{route('calendar')}}",
           //editable: true,
            //currentTimezone: 'Asia/Singapore',
            //timeFormat:'h(:mm)a',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay',

            },

        });
    });*/
</script>
@endsection

@endsection


<!--
            
       
        <div class="row">
          
          <section class="col-lg-7 connectedSortable ui-sortable">
           
            <div class="card">
              <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  To Do List
                </h3>

                <div class="card-tools">
                  <ul class="pagination pagination-sm">
                    <li class="page-item"><a href="#" class="page-link">«</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">»</a></li>
                  </ul>
                </div>
              </div>
              
              <div class="card-body">
                <ul class="todo-list ui-sortable" data-widget="todo-list">
                  <li>
                    
                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                   
                    <div class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo1" id="todoCheck1">
                      <label for="todoCheck1"></label>
                    </div>
                   
                    <span class="text">Design a nice theme</span>
                   
                    <small class="badge badge-danger"><i class="fas fa-clock"></i> 2 mins</small>
                   
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li class="done">
                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo2" id="todoCheck2" checked="">
                      <label for="todoCheck2"></label>
                    </div>
                    <span class="text">Make the theme responsive</span>
                    <small class="badge badge-info"><i class="fas fa-clock"></i> 4 hours</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo3" id="todoCheck3">
                      <label for="todoCheck3"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-warning"><i class="fas fa-clock"></i> 1 day</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo4" id="todoCheck4">
                      <label for="todoCheck4"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-success"><i class="fas fa-clock"></i> 3 days</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo5" id="todoCheck5">
                      <label for="todoCheck5"></label>
                    </div>
                    <span class="text">Check your messages and notifications</span>
                    <small class="badge badge-primary"><i class="fas fa-clock"></i> 1 week</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <li>
                    <span class="handle ui-sortable-handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo6" id="todoCheck6">
                      <label for="todoCheck6"></label>
                    </div>
                    <span class="text">Let theme shine like a star</span>
                    <small class="badge badge-secondary"><i class="fas fa-clock"></i> 1 month</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                </ul>
              </div>
             
              <div class="card-footer clearfix">
                <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
              </div>
            </div>
           
          </section>
         
          <section class="col-lg-5 connectedSortable ui-sortable">
           
            <div class="card bg-gradient-success">
              <div class="card-header border-0 ui-sortable-handle">
                <h3 class="card-title">
                  <i class="fas fa-calendar-alt"></i>
       
                  Calendar
                </h3>
                
                <div class="card-tools">
                  
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
               
              </div>

              <div class="card-body pt-0">
                
                <div id="calendar1" style="width: 100%"><div class="bootstrap-datetimepicker-widget usetwentyfour">
                    <ul class="list-unstyled">
                    <li class="show">
                        <div class="datepicker">
                        <div class="datepicker-days" style="">
                            <table class="table table-sm">
                            <thead>
                                <tr>
                                <th class="prev" data-action="previous">
                                    <span class="fa fa-chevron-left" title="Previous Month"></span>
                                </th>
                                <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">May 2021</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td data-action="selectDay" data-day="04/25/2021" class="day old weekend">25</td><td data-action="selectDay" data-day="04/26/2021" class="day old">26</td><td data-action="selectDay" data-day="04/27/2021" class="day old">27</td><td data-action="selectDay" data-day="04/28/2021" class="day old">28</td><td data-action="selectDay" data-day="04/29/2021" class="day old">29</td><td data-action="selectDay" data-day="04/30/2021" class="day old">30</td><td data-action="selectDay" data-day="05/01/2021" class="day weekend">1</td></tr><tr><td data-action="selectDay" data-day="05/02/2021" class="day weekend">2</td><td data-action="selectDay" data-day="05/03/2021" class="day">3</td><td data-action="selectDay" data-day="05/04/2021" class="day">4</td><td data-action="selectDay" data-day="05/05/2021" class="day">5</td><td data-action="selectDay" data-day="05/06/2021" class="day">6</td><td data-action="selectDay" data-day="05/07/2021" class="day">7</td><td data-action="selectDay" data-day="05/08/2021" class="day weekend">8</td></tr><tr><td data-action="selectDay" data-day="05/09/2021" class="day weekend">9</td><td data-action="selectDay" data-day="05/10/2021" class="day">10</td><td data-action="selectDay" data-day="05/11/2021" class="day">11</td><td data-action="selectDay" data-day="05/12/2021" class="day">12</td><td data-action="selectDay" data-day="05/13/2021" class="day active today">13</td><td data-action="selectDay" data-day="05/14/2021" class="day">14</td><td data-action="selectDay" data-day="05/15/2021" class="day weekend">15</td></tr><tr><td data-action="selectDay" data-day="05/16/2021" class="day weekend">16</td><td data-action="selectDay" data-day="05/17/2021" class="day">17</td><td data-action="selectDay" data-day="05/18/2021" class="day">18</td><td data-action="selectDay" data-day="05/19/2021" class="day">19</td><td data-action="selectDay" data-day="05/20/2021" class="day">20</td><td data-action="selectDay" data-day="05/21/2021" class="day">21</td><td data-action="selectDay" data-day="05/22/2021" class="day weekend">22</td></tr><tr><td data-action="selectDay" data-day="05/23/2021" class="day weekend">23</td><td data-action="selectDay" data-day="05/24/2021" class="day">24</td><td data-action="selectDay" data-day="05/25/2021" class="day">25</td><td data-action="selectDay" data-day="05/26/2021" class="day">26</td><td data-action="selectDay" data-day="05/27/2021" class="day">27</td><td data-action="selectDay" data-day="05/28/2021" class="day">28</td><td data-action="selectDay" data-day="05/29/2021" class="day weekend">29</td></tr><tr><td data-action="selectDay" data-day="05/30/2021" class="day weekend">30</td><td data-action="selectDay" data-day="05/31/2021" class="day">31</td><td data-action="selectDay" data-day="06/01/2021" class="day new">1</td><td data-action="selectDay" data-day="06/02/2021" class="day new">2</td><td data-action="selectDay" data-day="06/03/2021" class="day new">3</td><td data-action="selectDay" data-day="06/04/2021" class="day new">4</td><td data-action="selectDay" data-day="06/05/2021" class="day new weekend">5</td></tr></tbody></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2021</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month active">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month">Nov</span><span data-action="selectMonth" class="month">Dec</span></td></tr></tbody></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year active">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td></tr></tbody></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th><th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th><th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th></tr></thead><tbody><tr><td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade active" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td></tr></tbody></table></div></div></li><li class="picker-switch accordion-toggle"></li></ul></div></div>
              </div>
              
            </div>
           
             
          </section>
         
        </div>



-->
