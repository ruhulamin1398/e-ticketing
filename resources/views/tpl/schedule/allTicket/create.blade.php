@extends('tpl.includes.app')

@section('content')






<!-- Content Row -->
<div class="container-fluid ">

    <div class="row ">

        <!-- main body start -->
        <div class="col-12 col-md-6    ">
         

            <div class=" mb-4  text-center  bg-dark-color p-2  ">
                <div class="card border-none   bg-dark-color    p-2 ">

                    <h3 class="text-white"> Passenger information</h3>

                    <div class="card-body ">

                        <form>
                            @csrf
                            <div class="form-row align-items-center">
                                <div class="col-12 col-md-12">
                                    <span class=" pl-2"> Name</span>
                                    <input type="text" class="form-control mb-2" id="ticketCartPassengerName" required>
                                </div>

                                
                                <div class="col-12">

                                    <span class=" pl-2">NID <span id="nidCheck"> </span> </span>
                                    <input type="number" class="form-control mb-2" id="ticketCartPassengerNid" required>
                                </div>


                                
                                <div class="col-12">

                                    <span class=" pl-2">Phone <span id="phoneCheck"> </span> </span>
                                    <input type="text" value="+8801" class="form-control mb-2" id="ticketCartPassengerPhone" required>
                                </div>



                            </div>

                        </form>


                    </div>




                </div>
            </div>



 
            <div class=" mb-4  text-center  bg-dark-color p-2  ">
                <div class="card border-none   bg-dark-color    p-2 ">

                    <h3 class="text-white"> Cart</h3>
                    <div class="card-body ">




                        <form>
                            @csrf
                            <div class="form-row align-items-center">
                                <div class="col-6 col-md-6">
                                    <span class=" pl-2"> Type</span>
                                  
                                    <select class="form-control form-control" name="seat_type_id" id='seatTypeDropdown' required>
                                      
                                     
                                    </select>
                                
                                </div>
                                <div class="col-6 col-md-6">

                                    <span class=" pl-2">Total Ticket</span>
                                    <select class="form-control form-control" name="total_ticket" id='total_ticket_number' required>
                                        {{-- <option selected disabled>Select Seat </option> --}}
                                        {{-- <option value="1"> 1 </option>
                                        <option value="2"> 2 </option> --}}
                                    </select>
                                </div>


                                <div class="col-6 col-md-6" style="display: none;" id="total_ticket_cost_div" >
                                   
                                    <span class=" pl-2"> Cost</span>
                                  
                                    <input type="text" class="form-control form-control" id="total_ticket_cost"  readonly>
                                      
                                </div>
                                <div class="col-6 col-md-6 p-4" >
                                        <button class=" btn btn-success btn-lg btn-block p-2 " id="ticketSubmitBtn" type="button" style="display: none;" >Submit</button >
                                </div>
                              



                            </div>

                        </form>










                    </div>




                </div>
            </div>


        </div>

        <!-- Left Sidebar Start -->
        <div class="col-12 col-md-6   ">





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



            <div class=" mb-4  text-center   p-2 ">
                <div class="card      p-2">
                    <div class="card-header bg-dark-color">

                        <h3 class="text-white "> Available Ticket List</h3>
                    </div>
                    <div class="card-body" >




                        <table class="table    bg-dark-color" width="100%">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Availability</th>
                                </tr>
                            </thead>

                            <tbody id='scheduleTicketList'>

                            </tbody>
                        </table>











                    </div>




                </div>
            </div>



        </div>
    </div>
</div>
<!-- Content Row -->






<form action="{{ route('tpl-schedule-seat') }}" method="post" id="ticketSubmitForm">

    @csrf
    <input type="number" name="tpl_schedule_id" id="tpl_schedule_id"  hidden  >

    <input type="number" name="tpl_total_seat" id="tpl_total_seat"  hidden  >
    
    <input type="number" name="tpl_seat_id" id="tpl_seat_id"  hidden  >

    <input type="text" value="MR. X" name="name" id="ticketCartPassengerNameInput"    hidden >
    <input type="text" value="01" name="nid" id="ticketCartPassengerNidInput"  hidden>
    <input type="text"  value="01"  name="phone" id="ticketCartPassengerPhoneInput"  hidden   >

</form>






<!-- Create new product -->
<div class=" modal fade" id="create-ticket-reload-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-dark" id="edit-modal-label "> Ticket Buy Completed</h5>
                    </button>
                  </div>
                  <div class="modal-body" id="attachment-body-content">

                    <div class="card      p-2">
                        <div class="card-header bg-dark-color">

    
                            <h3 class="text-white " id="companyOnTicket"></h3>
                        </div>
                        <div class="card-body" >
                                
                        <table class="table   table-striped  " width="100%">
                            
                            <tbody class="text-dark">

                                <tr>
                                    <td> Passenger Name : </td>
                                    <td id="passengerNameOnTicket"> </td>
                                </tr>
                                <tr>
                                    <td> Passenger Phone : </td>
                                    <td id="passengerPhoneOnTicket"></td>
                                </tr>

                                
                                <tr>
                                    <td> Passenger NID : </td>
                                    <td id="passengerNidOnTicket"> </td>
                                </tr>


                                <tr>
                                    <td> Schedule : </td>
                                    <td id="scheduleOnTicket"></td>
                                </tr>
                                <tr>
                                    <td> From : </td>
                                    <td id="fromDestinationOnTicket"> </td>
                                </tr>
                                <tr>
                                    <td> To : </td>
                                    <td id="toDestinationOnTicket"> </td>
                                </tr>
                                <tr>
                                    <td> Seats : </td>
                                    <td id="SeatsOnTicket"> </td>
                                </tr>

                            </tbody>
                        </table>
                        </div>
    
    
    
    
                    </div>

                    <a href="" >  <button class="btn btn-success text-white">  Print  </button></a>

                  </div>

                </div>
              </div>
 </div>



<script>

$(document).ready(function () {


var cartArray = {};
var ticketCost = 0;;
var scheduleSeatData ;



$(document).on('click','#ticketSubmitBtn',function(){
    var data = $('#ticketSubmitForm').serialize();
    var action =  $('#ticketSubmitForm').attr('action');
    $.ajax({
            type: 'POST',
            url: action,
            data: data,
            success: function (successData) {
                
            console.log(successData);
                $('#companyOnTicket').text(successData.company_name);
                $('#passengerNameOnTicket').text(successData.customer_name);
                $('#passengerPhoneOnTicket').text(successData.customer_phone);
                $('#passengerNidOnTicket').text(successData.customer_nid);
                $('#scheduleOnTicket').text(successData.schedule);
                $('#fromDestinationOnTicket').text(successData.from_destination);
                $('#toDestinationOnTicket').text(successData.to_destination);
                $('#SeatsOnTicket').text(successData.seats_name);
                $("#create-ticket-reload-modal").modal();


                
            },
            error: function (data) {
            alert('Error');
            console.log(data);
            },
        });

});






            
$("#ticketCartPassengerName").change(function () {

    $("#ticketCartPassengerNameInput").val($("#ticketCartPassengerName").val());

});




$("#ticketCartPassengerPhone").keyup(function() {
            console.log(VAL);
            console.log("-------");
            var VAL = this.value;

            var result = (/^(?:\+88|88)?(01[3-9]\d{8})$/.test(VAL));

            if (result) {

                $("#phoneCheck").html('<span class="text-success">  Done </span>')
            } else {
                console.log("not matched");
                console.log(VAL);
                $("#phoneCheck").html('<span class="text-danger"> Invalid phone number </span>')
                console.log("-------");
            }


            $("#ticketCartPassengerPhoneInput").val($("#ticketCartPassengerPhone").val());
            $("#passengerPhoneOnTicket").text($("#ticketCartPassengerPhone").val());


        });



$("#ticketCartPassengerNid").keyup(function() {

var VAL = this.value;

var result = (/^[0-9]{1,17}$/.test(VAL));

if (result) {

    $("#nidCheck").html('<span class="text-success">  Done </span>')
} else {
    console.log("not matched");
    console.log(VAL);
    $("#nidCheck").html('<span class="text-danger"> Invalid nid number </span>')
    console.log("-------");
}




$("#ticketCartPassengerNidInput").val($("#ticketCartPassengerNid").val());
$("#passengerNidOnTicket").text($("#ticketCartPassengerNid").val());


});








$(document).on('input','#seatTypeDropdown',function(){
    
    var seat_id = $('#seatTypeDropdown').val()
    $('#tpl_seat_id').val(seat_id);
    console.log(scheduleSeatData);
    jQuery.each(scheduleSeatData,function(i){
        if(scheduleSeatData[i].id == seat_id){
            ticketCost = scheduleSeatData[i].cost;
            var htmlSeat = '';
            htmlSeat += '<option selected disabled>Select Seat </option>';
            if(scheduleSeatData[i].seat >1){
                htmlSeat += '<option value="1"> 1 </option>';
                htmlSeat += '<option value="2"> 2 </option>';
            }
            if(scheduleSeatData[i].seat == 1){
                htmlSeat += '<option value="1"> 1 </option>';
            }
            $('#total_ticket_number').html(htmlSeat);
        }

    });

});



$(document).on('input','#total_ticket_number',function(){
    var totalSeat = $('#total_ticket_number').val();
    
    $('#total_ticket_cost').val(ticketCost*totalSeat);
    $('#tpl_total_seat').val(totalSeat);
    $('#ticketSubmitBtn').show();
    $('#total_ticket_cost_div').show();

});









function printScheduleSeat(){
  var home = "{{route('home')}}";  
  var link = home.trim() + "/tpl-schedule-available-seat-list?tpl_schedule_id=" + $("#schedulePassengerPageSelectSchedule").val();
  console.log("link")
  console.log(link)
  console.log("link")

  $.get(link, function (data, status) {
    console.log("data");
    console.log(data);
    scheduleSeatData = data ;
html='';
dropdown="  <option selected disabled>Select Seat </option>";
    jQuery.each(data,function(key,value){
        
        html +=' <tr>' ;
        html += '<td class="  word-break ">'+ key+'</td>';
        html += '<td class="  word-break ">Tk '+ value.cost+'</td>';
        html += '<td class="  word-break "> '+ value.seat+'</td>';
        html += '</tr>';
       
dropdown+=" <option value="+ value.id + "> "+ key +"  </option>"

    });
   
    

    $("#scheduleTicketList").html(html);
    $("#seatTypeDropdown").html(dropdown);

  });
}

    printScheduleSeat();

    $("#schedulePassengerPageSelectSchedule").change(function () {
        $('#ticketSubmitBtn').hide();
        $('#total_ticket_cost_div').hide();
        $("#seatTypeDropdown").html('');
        $('#total_ticket_number').html('');
        $('#tpl_schedule_id').val($("#schedulePassengerPageSelectSchedule").val());
        printScheduleSeat();


    });

  });


</script>




@endsection