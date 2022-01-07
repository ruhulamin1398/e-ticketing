@extends('tpl.includes.app')

@section('content')






<!-- Content Row -->
<div class="container-fluid ">

    <div class="row ">

        <!-- main body start -->
        <div class="col-xl-6 col-lg-6 col-md-6   ">
         
{{-- 
            <div class=" mb-4  text-center  bg-dark-color p-2  ">
                <div class="card border-none   bg-dark-color    p-2 ">

                    <h3 class="text-white"> Passenger Information</h3>

                    <div class="card-body ">

                        <form>
                            @csrf
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <span class=" pl-2"> Name</span>
                                    <input type="text" class="form-control mb-2" id="ticketCartPassengerName" required>
                                </div>
                                <div class="col-auto">

                                    <span class=" pl-2">Phone</span>
                                    <input type="text" class="form-control mb-2" id="ticketCartPassengerPhone" required>
                                </div>



                            </div>

                        </form>


                    </div>




                </div>
            </div> --}}



            <div class=" mb-4  text-center   p-2 ">
                <div class="card      p-2">
                    <div class="card-header bg-dark-color">

                        <h3 class="text-white "> Schedule Ticket List</h3>
                    </div>
                    <div class="card-body" >




                        <table class="table  table-borderless  bg-dark-color" width="100%">

                            <tbody id='scheduleTicketList'>

                            </tbody>
                        </table>











                    </div>




                </div>
            </div>



        </div>

        <!-- Left Sidebar Start -->
        <div class="col-xl-6 col-lg-6 col-md-6   ">





            <div class=" mb-4  text-center  bg-dark-color p-2 ">
                <div class="card border-none   bg-dark-color    p-2">
                    <h3 class="text-white"> Schedule</h3>

                    <div class="card-body">





                        <div class="col-auto">


                            {{-- <span class="text-light pl-2">Schedule</span> --}}

                            <select class="form-control form-control" name="road_id" id='schedulePassengerPageSelectSchedule' required>
                                <option selected>Select Schedule </option>
                                @foreach ($schedules as $schedule)
                                @php
                                    $schedule->abasas();
                                @endphp
                                <option value={{$schedule->id}}> {{$schedule->to_destination }} - {{$schedule->schedule }}  </option>
                                @endforeach
                            </select>

                        </div>
                        








                    </div>




                </div>
            </div>


            {{-- <div class=" mb-4  text-center  bg-dark-color p-2  ">
                <div class="card border-none   bg-dark-color    p-2 ">

                    <h3 class="text-white"> Cart</h3>
                    <div class="card-body ">


                        <table class="table   table-striped  " width="100%">
                            <thead class=" text-light ">
                                <th>Seats</th>
                                <th>Price</th>
                                <th>Action</th>
                            </thead>
                            <tbody class="text-light" id='cartBody'>



                            </tbody>
                        </table>

                    </div>




                </div>
            </div> --}}




        </div>
    </div>
</div>
<!-- Content Row -->








<!-- Create new product -->
<div class=" modal fade" id="create-ticket-reload-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-dark" id="edit-modal-label "> Ticket Buy Completed</h5>
                    </button>
                  </div>
                  <div class="modal-body" id="attachment-body-content">


                    <button class="btn btn-success text-white"> <a href="" >  Reload </a> </button>

                  </div>

                </div>
              </div>
 </div>



<script>

$(document).ready(function () {


var cartArray = {};
var ticketCost = 0;;



// $("#schedulePassengerPageSelectRoad").change(function () {


//   var link = $("#road-view-api").val().trim() + "?id=" + $("#schedulePassengerPageSelectRoad").val();
//   $.get(link, function (data, status) {
//     ticketCost = data.cost;
//     cartArray = {};

//     $("#busBody").html('');
//   });



//   var link = $("#road-schedule-api").val().trim() + "?id=" + $("#schedulePassengerPageSelectRoad").val();


//   $.get(link, function (data, status) {

//     var html = '<option selected>Select Schedule </option>'


//     jQuery.each(data, function (row) {
//       console.log(data[row])
//       html += '<option value=' + data[row].id + '>' + data[row].date_time + ' </option>';
//     });
//     $('#schedulePassengerPageSelectSchedule').html(html);


//   });


// });













function printScheduleSeat(){
  var home = "{{route('home')}}";  
  var link = home.trim() + "/tpl-schedule-seat?tpl_schedule_id=" + $("#schedulePassengerPageSelectSchedule").val();
  console.log("link")
  console.log(link)
  console.log("link")

  $.get(link, function (data, status) {
    console.log("data");
    console.log(data);
html='';
    jQuery.each(data,function(i){
        if(data[i].status_id==3){
        html +=' <tr>' ;
        html += '<td class="  word-break ">'+ data[i].seat_name+'</td>';
        html += '<td class="  word-break ">'+ data[i].customer_name+'</td>';
        html += '<td class="  word-break ">'+ data[i].customer_phone+'</td>';
        html += '</tr>';
        }

    });
   
  

    $("#scheduleTicketList").html(html);

  });
}

printScheduleSeat();

$("#schedulePassengerPageSelectSchedule").change(function () {
printScheduleSeat();

});




});


</script>




@endsection