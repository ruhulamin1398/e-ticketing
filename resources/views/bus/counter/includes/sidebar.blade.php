<!-- Sidebar -->
<ul class="navbar-nav bg-dark-color  sidebar sidebar-dark accordion sidebar-toggled " id="accordionSidebar">

    <hr class="sidebar-divider m-1 p-0 ">
    <li class="nav-item  ">
        <a class="nav-link p-3 " href="{{ route('bus.bus-schedules.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Bus Schedule</span></a>
    </li> 
    <hr class="sidebar-divider m-1 p-0 ">


     <li class="nav-item  ">
        <a class="nav-link p-3 " href="{{ route("bus.busCounterNewTicket") }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>New Ticket</span></a>
    </li> 

    <hr class="sidebar-divider m-1 p-0 ">

{{--
    <li class="nav-item  ">
       <a class="nav-link p-3 " href="{{ route("bus.busCounterTickets") }}">
           <i class="fas fa-fw fa-tachometer-alt"></i>
           <span>All Tickets</span></a>
   </li> 
   --}}

  
    

    
  
    {{-- 
        <hr class="sidebar-divider m-1 p-0 ">
    <li class="nav-item">
        <a class="nav-link collapsed  p-3 " href="#" data-toggle="collapse" data-target="#collapsePurchase" aria-expanded="true" aria-controls="collapsePurchase">
            <i class="fas fa-fw fa-cog"></i>
            <span>Committee</span>
        </a>
        <div id="collapsePurchase" class="collapse" aria-labelledby="headingPurchase" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="">Committee </a>
                <a class="collapse-item" href="">Add Committee </a>
                <a class="collapse-item" href="">Designation </a>
                <a class="collapse-item" href="">Session </a>

            </div>
        </div>
    </li> --}}
  
    
    <!-- Divider -->
    <hr class="sidebar-divider m-1 p-0 ">
    <!-- Nav Item - Dashboard -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center  d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
