@extends('customer.includes.app')

@section('content')


<!-- Content Row -->
<div class="container-fluid ">

    <div class="row ">

        <!-- main body start -->
        <div class="col-xl-6 col-lg-6 col-md-6   ">





            <div class=" mb-4  text-center   p-2 ">
                <div class="card      p-2">
                    <div class="card-header bg-dark-color">

                        <h3 class="text-white "> Seat Plan</h3>
                    </div>
                    <div class="card-body">




                        <table class="table  table-borderless  bg-dark-color" width="100%">

                            <tbody id='seatPlanBody'>

                            </tbody>
                        </table>











                    </div>




                </div>
            </div>



        </div>

        <!-- Left Sidebar Start -->
        <div class="col-xl-6 col-lg-6 col-md-6   ">



            {{-- #schedulePassengerPageSelectSchedule --}}




            <div class=" mb-4  text-center  bg-dark-color p-2  ">
                <div class="card border-none   bg-dark-color    p-2 ">

                    <h3 class="text-white"> Cart</h3>
                    <div class="card-body ">

                        <div class="form-row align-items-center">
                            <div class="col-12 col-md-12">
                                <span class=" pl-2"> Name</span>
                                <input type="text" class="form-control mb-2" value="{{ Auth::user()->name }}" id="ticketCartPassengerName" required>
                            </div>


                            <div class="col-12">

                                <span class=" pl-2">NID <span id="nidCheck"> </span> </span>
                                <input type="number" class="form-control mb-2" value="{{ Auth::user()->nid }}" id="ticketCartPassengerNid" required>
                            </div>



                            <div class="col-12">

                                <span class=" pl-2">phone <span id="phoneCheck"> </span> </span>
                                <input type="text" class="form-control mb-2" value="{{ Auth::user()->phone }}" id="ticketCartPassengerPhone" required>
                            </div>



                        </div>


                        <div class="row" id="payment_system">
                            <div class="form-check col-4 p-4 ">
                                <input class="form-check-input " type="radio" name="exampleRadios" id="account_type" value="option1" checked>
                                <label class="form-check-label" for="account_type">
                                    <img src="{{ asset('img/bkash.png') }}" alt="bkash" width="70px">
                                </label>
                            </div>

                            <div class="form-check col-4 p-4">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="account_type" value="option1">
                                <label class="form-check-label" for="account_type">
                                    <img src="{{ asset('img/rocket.jpg') }}" alt="bkash" width="70px">
                                </label>
                            </div>

                            <div class="form-check col-4 p-4">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="account_type" value="option1">
                                <label class="form-check-label" for="account_type">
                                    <img src="{{ asset('img/nogod.png') }}" alt="bkash" width="70px">
                                </label>
                            </div>
                            <div class="form-check col-12 pb-4">

                            <div id="accountCheck"> </div>
                                <input class="form-control" type="tex" name="account_no" value="+8801" id="account_no" placeholder="Account No">
                            </div>
                        </div>

                        <table class="table   table-striped  " width="100%">
                            <thead class=" text-light ">
                                <th>Seats</th>
                                <th>price</th>
                                <th>Action</th>
                            </thead>
                            <tbody class="text-light" id='cartBody'>



                            </tbody>
                        </table>

                    </div>




                </div>
            </div>




        </div>
    </div>
</div>
<!-- Content Row -->






<form action="{{route('bus.bus-seats')}}" method="POST" id="ticketSubmitForm">

    @csrf
    <input type="number" name="bus_seat_id" id="cart_bus_seat_id" hidden>
    <input type="number" name="schedule_id" id="cart_schedule_id" value="{{ $schedule->id }}" hidden>

    <input type="text" id="ticketCartPassengerNameInput" value="{{ Auth::user()->name }}" name="name" hidden>
    <input type="text" id="ticketCartPassengerPhoneInput" value="{{ Auth::user()->phone }}" name="phone" hidden>
    <input type="text" id="ticketCartPassengerNidInput" value="{{ Auth::user()->nid }}" name="nid" hidden>
    <input type="text" value="{{ Auth::user()->id }}" name="user_id" hidden>

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


                        <h3 class="text-white "> {{ $schedule->companies->name }}</h3>
                    </div>
                    <div class="card-body">

                        <table class="table   table-striped  " width="100%">

                            <tbody class="text-dark">

                                <tr>
                                    <td> Passenger Name : </td>
                                    <td id="passengerNameOnTicket"> {{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <td> Passenger Phone :</td>
                                    <td id="passengerPhoneOnTicket">{{ Auth::user()->phone }}</td>
                                </tr>  <tr>
                                    <td> Passenger NID :</td>
                                    <td id="passengerNidOnTicket">{{ Auth::user()->nid }}</td>
                                </tr>
                                <tr>
                                    <td> Schedule : </td>
                                    <td id="scheduleOnTicket">{{ $schedule->schedule }}</td>
                                </tr>
                                <tr>
                                    <td> From : </td>
                                    <td id="fromDestinationOnTicket">{{ $schedule->destinations->name }} </td>
                                </tr>
                                <tr>
                                    <td> To : </td>
                                    <td id="toDestinationOnTicket">{{ $schedule->fromDestinations->name }} </td>
                                </tr>
                                <tr>
                                    <td> Seats : </td>
                                    <td id="SeatsOnTicket"> </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>




                </div>


                <a href=""><button class="btn btn-success text-white"> Print </button></a>

            </div>

        </div>
    </div>
</div>



<script>
    $(document).ready(function() {

        var schedule;
        var cartArray = {};
        var ticketCost = 0;;

        function showCart() {
            var html = "";
            var totalCost = 0;
            var cartArrayLenth = 0;
            jQuery.each(cartArray, function(data) {
                totalCost += ticketCost;
                cartArrayLenth++;

                html += ' <tr class=" text-light ">';
                html += ' <td>' + cartArray[data].name + '</td>';
                html += ' <td>' + ticketCost + '</td>';
                html +=
                    ' <td>    <button type="button" class="btn btn-danger" id="delete-cart-seat" data-id="' +
                    data + '" > <i class="fa fa-trash" aria-hidden="false"> </i></button></td>';
                html += ' </tr>';
            });
            html += ' <tr >';
            html += ' <td></td>';
            html += ' <th> Total</th>';
            html += ' <td> ' + totalCost + '  </td>';
            html += ' </tr>';

            html += ' <tr >';
            html += ' <td></td>';
            html += ' <th> </th>';
            html +=
                ' <td>  <button type="button" class="btn btn-success" id="submit-cart-seat"  > Submit </button>  </td>';
            html += ' </tr>';


            if (cartArrayLenth > 0)
                $('#cartBody').html(html);
            else

                $('#cartBody').html("<tr><td rowspan='5'>No Ticket Selected </td> </tr>");


        }













        var home = "{{ route('home') }}";
        var scheduleData = @json($schedule);
        ticketCost = scheduleData.cost;
        console.log(ticketCost);
        cartArray = {};

        $("#seatPlanBody").html('');

        showCart();

        var link = home.trim() + "/bus/bus-schedule-seat?schedule_id=" + scheduleData.id;

        $.get(link, function(data, status) {

            console.log(data);
            var html = "";
            html += '<tr>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td></td>';
            html += '<td> </td>';
            html += ' <td style="height: 60px;"> <span class="h3">Driver</span> </td>';
            html += '</tr>';

            var j = 0;
            for (var i = 1; i <= 9; i++) {
                html += '  <tr>'


                html += '  <td><button class="btn btn-success seat"';
                if (data[j].status_id != 1) {
                    html += 'disabled ';
                };
                html += 'schedule_id= "' + data[j].schedule_id + '"';
                html += 'id="' + data[j].id + '"';
                html += '>' + data[j++].seat_name + ' </button></td>';



                html += '  <td><button class="btn btn-success seat"';
                if (data[j].status_id != 1) {
                    html += 'disabled ';
                };

                html += 'schedule_id= "' + data[j].schedule_id + '"';
                html += 'id="' + data[j].id + '"';

                html += '>' + data[j++].seat_name + '</button></td>';



                html += '  <td></td>';
                html += '  <td></td>';


                html += '  <td><button class="btn btn-success seat"';
                if (data[j].status_id != 1) {
                    html += 'disabled ';
                };

                html += 'schedule_id= "' + data[j].schedule_id + '"';
                html += 'id="' + data[j].id + '"';

                html += '> ' + data[j++].seat_name + ' </button></td>';



                html += '  <td><button class="btn btn-success seat"';
                if (data[j].status_id != 1) {
                    html += 'disabled ';
                };


                html += 'schedule_id= "' + data[j].schedule_id + '"';
                html += 'id="' + data[j].id + '"';

                html += '> ' + data[j++].seat_name + ' </button></td>';



                html += '</tr>';
            }

            $("#seatPlanBody").html(html);

        });





        $("body").on("click", ".seat", function() {

            var id = $(this).attr('id');
            var schedule_id = $(this).attr('schedule_id');
            var name = $(this).text();

            cartArray[id] = {
                schedule_id: schedule_id,
                name: name,
                bus_set_id: id,

            };
            showCart();
        });


        $("body").on("click", "#delete-cart-seat", function() {

            var id = $(this).attr('data-id');

            delete cartArray[id];
            showCart();
        });


        $("#ticketCartPassengerName").change(function() {

            $("#ticketCartPassengerNameInput").val($("#ticketCartPassengerName").val());
            $("#passengerNameOnTicket").text($("#ticketCartPassengerName").val());


        });


        $("#ticketCartPassengerNid").keyup(function() {

            var VAL = this.value;

            var result = (/^[0-9]{10,17}$/.test(VAL));

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


        });
        $("#account_no").keyup(function() {
            console.log(VAL);
            console.log("-------");
            var VAL = this.value;

            var result = (/^(?:\+88|88)?(01[3-9]\d{8,9})$/.test(VAL));

            if (result) {

                $("#accountCheck").html('<span class="text-success">  Done </span>')
            } else {
                console.log("not matched");
                console.log(VAL);
                $("#accountCheck").html('<span class="text-danger"> Invalid Payment number </span>')
                console.log("-------");
            }

            $("#passengerPhoneOnTicket").val($("#ticketCartPassengerPhone").val());


        });





        $("body").on("click", "#submit-cart-seat", function() {
            var account = $('#account_no').val();
            console.log(account);
            var len = account.length;


            if (len >= 11) {



                var ticketLists = '';
                jQuery.each(cartArray, function(i) {
                    ticketLists += cartArray[i].name + ','
                    $('#cart_bus_seat_id').val(cartArray[i].bus_set_id);
                    $('#cart_schedule_id').val(cartArray[i].schedule_id);




                    var OPfrm = $('#ticketSubmitForm');
                    var act = OPfrm.attr('action');
                    $.ajax({
                        type: OPfrm.attr('method'),
                        url: act,
                        data: OPfrm.serialize(),
                        success: function(successData) {

                            console.log(successData);
                        },
                        error: function(data) {
                            console.log("can not add ticket ");
                            console.log(data);
                        },
                    });


                });


                $('#SeatsOnTicket').text(ticketLists);
                $("#create-ticket-reload-modal").modal();
            } else {
                alert('Enter Valid Payment Account');
            }
        });














    });
</script>





@endsection