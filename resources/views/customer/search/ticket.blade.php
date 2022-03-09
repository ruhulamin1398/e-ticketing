@extends('customer.includes.app')

@section('content')



<div class="card      p-2">
    <div class="card-header bg-dark-color">


        <h3 class="text-white ">Available Buses</h3>
    </div>
    <div class="card-body" >
            
    <table class="table   table-striped  " width="100%">
        
        <thead class=" text-dark ">
            <th>Company</th>
            <th>Dep. Time</th>
            <th>Seats Available</th>
            <th>Ticket Price</th>
            <th>Action</th>
        </thead>

        <tbody class="text-dark">
            @foreach ($bus_schedules as $schedule)
            <tr>
                <td>{{ $schedule->companies->name }}</td>
                <td>{{ Carbon\Carbon::parse($schedule->schedule)->format('h:i:a') }}</td>
                <td> {{ $schedule->available }}</td>
                <td>{{ $schedule->cost }}</td>
                <form action="{{ route('book-ticket') }}" method="GET" >
                    <input type="text" name="company_type_id" value="{{ $company_type_id }}" hidden>
                    <input type="text" name="schedule_id" value="{{ $schedule->id }}" hidden>
                <td><button type="submit" class="btn btn-primary">Book Ticket</button></td>
                </form>


            </tr>
                
            @endforeach
            

        </tbody>
    </table>
    </div>




</div>



<div class="card      p-2">
    <div class="card-header bg-dark-color">


        <h3 class="text-white ">Available  Trains</h3>
    </div>
    <div class="card-body">

        <table class="table   table-striped  " width="100%">

            <thead class=" text-dark ">
                <th>Company</th>
                <th>Name</th>
                <th>Dep. Time</th>
                <th>Cost</th>
                <th>Action</th>
            </thead>

            <tbody class="text-dark">
                @foreach ($train_schedules as $schedule)
                @if ($schedule->tpls->to_destination_id == $to_destination_id)

                <tr>
                    <td>{{ $schedule->company->name }}</td>
                    <td>{{ $schedule->tpls->name }}</td>
                    <td>{{ Carbon\Carbon::parse($schedule->schedule)->format('h:i:a') }}</td>
                    
                    <td>{{ $schedule->cost }}</td>
                    <form action="{{ route('book-ticket') }}" method="GET" >
                        <input type="text" name="company_type_id" value="{{ $company_type_id }}" hidden>
                        <input type="text" name="schedule_id" value="{{ $schedule->id }}" hidden>
                    <td><button type="submit" class="btn btn-primary">Book Ticket</button></td>
                    </form>



                </tr>

                @endif

                @endforeach


            </tbody>
        </table>
    </div>




</div>



<div class="card      p-2">
    <div class="card-header bg-dark-color">


        <h3 class="text-white ">Available  Launches</h3>
    </div>
    <div class="card-body">

        <table class="table   table-striped  " width="100%">

            <thead class=" text-dark ">
                <th>Company</th>
                <th>Name</th>
                <th>Dep. Time</th>
                <th>Cost</th>
                <th>Action</th>
            </thead>

            <tbody class="text-dark">
                @foreach ($launch_schedules as $schedule)
                @if ($schedule->tpls->to_destination_id == $to_destination_id)

                <tr>
                    <td>{{ $schedule->company->name }}</td>
                    <td>{{ $schedule->tpls->name }}</td>
                    <td>{{ Carbon\Carbon::parse($schedule->schedule)->format('h:i:a') }}</td>
                    
                    <td>{{ $schedule->cost }}</td>
                    <form action="{{ route('book-ticket') }}" method="GET" >
                        <input type="text" name="company_type_id" value="{{ $company_type_id }}" hidden>
                        <input type="text" name="schedule_id" value="{{ $schedule->id }}" hidden>
                    <td><button type="submit" class="btn btn-primary">Book Ticket</button></td>
                    </form>



                </tr>

                @endif

                @endforeach


            </tbody>
        </table>
    </div>




</div>


<div class="card      p-2">
    <div class="card-header bg-dark-color">


        <h3 class="text-white ">Available  Air Planes</h3>
    </div>
    <div class="card-body">

        <table class="table   table-striped  " width="100%">

            <thead class=" text-dark ">
                <th>Company</th>
                <th>Name</th>
                <th>Dep. Time</th>
                <th>Cost</th>
                <th>Action</th>
            </thead>

            <tbody class="text-dark">
                @foreach ($plane_schedules as $schedule)
                @if ($schedule->tpls->to_destination_id == $to_destination_id)

                <tr>
                    <td>{{ $schedule->company->name }}</td>
                    <td>{{ $schedule->tpls->name }}</td>
                    <td>{{ Carbon\Carbon::parse($schedule->schedule)->format('h:i:a') }}</td>
                     
                    <td>{{ $schedule->cost }}</td>
                    <form action="{{ route('book-ticket') }}" method="GET" >
                        <input type="text" name="company_type_id" value="{{ $company_type_id }}" hidden>
                        <input type="text" name="schedule_id" value="{{ $schedule->id }}" hidden>
                    <td><button type="submit" class="btn btn-primary">Book Ticket</button></td>
                    </form>



                </tr>

                @endif

                @endforeach


            </tbody>
        </table>
    </div>




</div>




@endsection