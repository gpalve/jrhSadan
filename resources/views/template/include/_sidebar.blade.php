<style>
    .dropend:hover .dropdown-menu {
        display: block;
        margin-top: 0;
    }

</style>
<div class="bg-white border-right border-top border-bottom border-right shadow" id="sidebar-wrapper">
    <div class="d-flex flex-column"
        style="width: 10.5rem; border-top-right-radius:0.5rem; border-bottom-right-radius:0.5rem">
        <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
            <li>
                <a href="{{ route('dashboard.index') }}"
                    class="nav-link py-3 border-bottom myBtn
                    {{ in_array(Route::currentRouteName(), ['dashboard.index', 'chart.dialyGuest']) ? 'active' : '' }}
                    "
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            @if (auth()->user()->role == 'Super' || auth()->user()->role == 'Admin')

            
                <li>
                    <a href="{{ route('transaction.index') }}"
                        class="nav-link py-3 border-bottom border-right myBtn
                        {{ in_array(Route::currentRouteName(), ['payment.index', 'transaction.index', 'transaction.reservation.usersearch', 'transaction.reservation.storeCustomer', 'transaction.reservation.viewCountPerson', 'transaction.reservation.chooseRoom', 'transaction.reservation.confirmation', 'transaction.reservation.payDownPayment']) ? 'active' : '' }}
                        "
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Transactions">
                        <i class="fas fa-cash-register"></i> &nbsp; Details
                    </a>
                </li>
                <li>
                    <a href="{{ route('transaction.reservation.viewStatusRoom') }}"
                        class="nav-link py-3 border-bottom myBtn
                        {{ in_array(Route::currentRouteName(), ['transaction.reservation.viewStatusRoom']) ? 'active' : '' }}
                        "
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                        <i class="fas fa-question-circle"></i> &nbsp; Availability                  
                    </a>
                </li>
                <li>
                    <a href="{{ route('transaction.reservation.createIdentity') }}"
                        class="nav-link py-3 border-bottom myBtn
                        {{ in_array(Route::currentRouteName(), ['transaction.reservation.createIdentity']) ? 'active' : '' }}
                        "
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                        <i class="fas fa-plus"></i> &nbsp; New Patient
                    </a>
                </li>

                <li>
                    <a href="{{ route('approver') }}"
                        class="nav-link py-3 border-bottom myBtn
                        {{ in_array(Route::currentRouteName(), ['approver']) ? 'active' : '' }}
                        "
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                        <i class="fas fa-check"></i> &nbsp; Approval
                    </a>
                </li>

                <li>
                    <a href="{{ route('transaction.reservation.pickFromCustomer') }}"
                        class="nav-link py-3 border-bottom myBtn
                        {{ in_array(Route::currentRouteName(), ['transaction.reservation.pickFromCustomer']) ? 'active' : '' }}
                        "
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard">
                        <i class="fas fa-clock"></i> &nbsp; Extension
                    </a>
                </li>
                <li>
                    <a class="nav-link py-3 border-bottom border-right myBtn  dropdown-toggle dropend
                    {{ in_array(Route::currentRouteName(), ['room.index', 'room.show', 'room.create', 'room.edit', 'type.index', 'type.create', 'type.edit', 'roomstatus.index', 'roomstatus.create', 'roomstatus.edit']) ? 'active' : '' }}
                        "
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> &nbsp; Admin
                    </a>
                    <ul class="dropdown-menu">
                        @if (auth()->user()->role == 'Super')
                        <li><a class="dropdown-item" href="{{ route('room.index') }}">Room</a></li>
                        <li><a class="dropdown-item" href="{{ route('type.index') }}">Type</a></li>
                        <li><a class="dropdown-item" href="{{ route('roomstatus.index') }}">Status</a></li>
                        <li><a class="dropdown-item" href="{{ route('facility.index') }}">Facility</a></li>
                        <li><a class="dropdown-item" href="{{ route('customer.index') }}">Customer</a></li>
                        
                        <li><a class="dropdown-item" href="{{ route('user.index') }}">User</a></li>
                        @endif
                    </ul>
                </li>
                {{-- <li>
                    <a class="nav-link py-3 border-bottom border-right myBtn  dropdown-toggle
                        {{ in_array(Route::currentRouteName(), ['customer.index', 'customer.create', 'customer.edit', 'user.index', 'user.create', 'user.edit']) ? 'active' : '' }}
                    "
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-users"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('customer.index') }}">Customer</a></li>
                        @if (auth()->user()->role == 'Super')
                            <li><a class="dropdown-item" href="{{ route('user.index') }}">User</a></li>
                        @endif
                    </ul>
                </li> --}}
            @endif
        </ul>
    </div>
</div>
