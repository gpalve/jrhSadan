@extends('template.master')
@section('title', 'Reservation')
@section('content')
    <div class="row mt-2 mb-2">
        <div class="col-lg-6 mb-2">
            <div class="d-grid gap-2 d-md-block">
                <span data-bs-toggle="tooltip" data-bs-placement="right" title="Add Room Reservation">
                    <button type="button" class="btn btn-success shadow-sm myBtn border rounded" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <i class="fas fa-plus"></i> &nbsp; New Room Booking
                    </button>
                </span>
                {{-- <span data-bs-toggle="tooltip" data-bs-placement="right" title="Payment History">
                    <a href="{{route('payment.index')}}" class="btn btn-sm shadow-sm myBtn border rounded">
                        <i class="fas fa-history"></i>
                    </a>
                </span> --}}
                <span data-bs-toggle="tooltip" data-bs-placement="right" title="Payment History">
                    <a href="/approver" class="btn btn-info shadow-sm myBtn border rounded">
                        <i class="fas fa-history"></i> &nbsp; Pending Approvals
                    </a>
                </span>
            </div>
        </div>
        <div class="col-lg-6 mb-2">
            <form class="d-flex" method="GET" action="{{ route('transaction.index') }}">
                <input class="form-control me-2" type="search" placeholder="Search by ID" aria-label="Search"
                    id="search-user" name="search" value="{{ request()->input('search') }}">
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row my-2 mt-4 ms-1">
        <div class="col-lg-12">
            <h5><b>Confirm Patient:</b> </h5>
        </div>
    </div>
    <div class="row" style="background-color: #11aa11">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Patient</th>
                                    <th>Room</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Total Stay Period</th>
                                    <th>Referred By Dr</th>
                                    <th>Diagnosis</th>
                                    <th>Ward/Cot</th>
                                    <th>Desig</th>
                                    <th>UMID</th>
                                    {{-- <th>Debt</th> --}}
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactions as $transaction)
                                    <tr>
                                        <th>{{ ($transactions->currentpage() - 1) * $transactions->perpage() + $loop->index + 1 }}
                                        </th>
                                        <td>{{ $transaction->id }}</td>
                                        <td>{{ $transaction->customer->name }}</td>
                                        <td>{{ $transaction->room->number }}</td>
                                        <td>{{ Helper::dateFormat($transaction->check_in) }}</td>
                                        <td>{{ Helper::dateFormat($transaction->check_out) }}</td>
                                        <td>{{ $transaction->getDateDifferenceWithPlural($transaction->check_in, $transaction->check_out) }}
                                        </td>
                                        <td>{{ $transaction->customer->ref }}
                                        </td>
                                        <td>
                                            {{ $transaction->customer->diagnosis }}
                                        </td>
                                        <td>Ward -{{$transaction->customer->ward }} Cot - {{$transaction->customer->cot}}</td>
                                        <td>{{$transaction->customer->job }}</td>
                                        <td>{{$transaction->customer->umid }}</td>
                                        {{-- <td>{{ $transaction->getTotalPrice() - $transaction->getTotalPayment() <= 0 ? '-' : Helper::convertToRupiah($transaction->getTotalPrice() - $transaction->getTotalPayment()) }}
                                        </td> --}}
                                        <td style="text-align: center;">
                                            
                                            <a href="/generate/{{$transaction->id}}/{{ $transaction->customer->id }}"><span class="btn btn-sm bg-success badge-success">Generate  Letter</span></a>

                                            <a href="/{{$transaction->customer->id}}/viewCountPerson"><span class="btn btn-sm bg-warning badge-success">Extension</span></a>

                                            <a class="btn btn-light btn-sm rounded shadow-sm border p-1 m-0 {{$transaction->getTotalPrice() - $transaction->getTotalPayment() <= 0 ? 'disabled' : ''}}"
                                                href="{{ route('transaction.payment.create', ['transaction' => $transaction->id]) }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Pay">
                                                <i class="fas fa-money-bill-wave-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="15" class="text-center">
                                            There's no data in this table
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $transactions->onEachSide(2)->links('template.paginationlinks') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-2 mt-4 ms-1">
        <div class="col-lg-12">
            <h5> <b>Approval Pending:</b> </h5>
        </div>
    </div>
    <div class="row" style="background-color: #e6e957">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Patient</th>
                                    <th>Room</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Total Stay Period</th>
                                    <th>Referred By Dr</th>
                                    <th>Diagnosis</th>
                                    <th>Ward/Cot</th>
                                    <th>Desig</th>
                                    <th>UMID</th>
                                    {{-- <th>Debt</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pendingTransactions as $pendingTransaction)
                                    <tr>
                                        <th>{{ ($pendingTransactions->currentpage() - 1) * $pendingTransactions->perpage() + $loop->index + 1 }}
                                        </th>
                                        <td>{{ $pendingTransaction->id }}</td>
                                        <td>{{ $pendingTransaction->customer->name }}</td>
                                        <td>{{ $pendingTransaction->room->number }}</td>
                                        <td>{{ Helper::dateFormat($pendingTransaction->check_in) }}</td>
                                        <td>{{ Helper::dateFormat($pendingTransaction->check_out) }}</td>
                                        <td>{{ $transaction->getDateDifferenceWithPlural($pendingTransaction->check_in, $pendingTransaction->check_out) }}
                                        </td>
                                        <td>{{ $transaction->customer->ref }}
                                        </td>
                                        <td>
                                            {{ $transaction->customer->diagnosis }}
                                        </td>
                                        <td>Ward -{{$transaction->customer->ward }} Cot - {{$transaction->customer->cot}}</td>
                                        <td>{{$transaction->customer->job }}</td>
                                        <td>{{$transaction->customer->umid }}</td>
                                        {{-- <td>{{ $pendingTransaction->getTotalPrice() - $pendingTransaction->getTotalPayment() <= 0 ? '-' : Helper::convertToRupiah($pendingTransaction->getTotalPrice() - $pendingTransaction->getTotalPayment()) }}
                                        </td> --}}
                                        <td>
                                            <a class="btn btn-light btn-sm rounded shadow-sm border p-1 m-0 {{$pendingTransaction->getTotalPrice() - $pendingTransaction->getTotalPayment() <= 0 ? 'disabled' : ''}}"
                                                href="{{ route('transaction.payment.create', ['transaction' => $pendingTransaction->id]) }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Pay">
                                                <i class="fas fa-money-bill-wave-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="15" class="text-center">
                                            There's no data in this table
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $transactions->onEachSide(2)->links('template.paginationlinks') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-2 mt-4 ms-1">
        <div class="col-lg-12">
            <h5><b>Overdue:</b> </h5>
        </div>
    </div>
    <div class="row" style="background-color: #e5561e">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Patient</th>
                                    <th>Room</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Total Stay Period</th>
                                    <th>Referred By Dr</th>
                                    <th>Diagnosis</th>
                                    <th>Ward/Cot</th>
                                    <th>Desig</th>
                                    <th>UMID</th>
                                    {{-- <th>Debt</th> --}}
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transactionsExpired as $transaction)
                                <tr>
                                    <th>{{ ($transactions->currentpage() - 1) * $transactions->perpage() + $loop->index + 1 }}
                                    </th>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $transaction->customer->name }}</td>
                                    <td>{{ $transaction->room->number }}</td>
                                    <td>{{ Helper::dateFormat($transaction->check_in) }}</td>
                                    <td>{{ Helper::dateFormat($transaction->check_out) }}</td>
                                    <td>{{ $transaction->getDateDifferenceWithPlural($transaction->check_in, $transaction->check_out) }}
                                    </td>
                                    <td>{{ $transaction->customer->ref }}
                                    </td>
                                    <td>
                                        {{ $transaction->customer->diagnosis }}
                                    </td>
                                    <td>Ward -{{$transaction->customer->ward }} Cot - {{$transaction->customer->cot}}</td>
                                    <td>{{$transaction->customer->job }}</td>
                                    <td>{{$transaction->customer->umid }}</td>
                                    {{-- <td>{{ $transaction->getTotalPrice() - $transaction->getTotalPayment() <= 0 ? '-' : Helper::convertToRupiah($transaction->getTotalPrice($transaction->room->price, $transaction->check_in, $transaction->check_out) - $transaction->getTotalPayment()) }}
                                    </td> --}}
                                    <td style="text-align: center;">

                                        <a href="/generate/{{$transaction->id}}/{{ $transaction->customer->id }}"><span class="btn btn-sm bg-success badge-success">Generate  Letter</span></a>

                                        <a href="/{{$transaction->customer->id}}/viewCountPerson"><span class="btn btn-sm bg-warning badge-success">Extension</span></a>

                                        <a class="btn btn-light btn-sm rounded shadow-sm border p-1 m-0 {{$transaction->getTotalPrice($transaction->room->price, $transaction->check_in, $transaction->check_out) - $transaction->getTotalPayment() <= 0 ? 'disabled' : ''}}"
                                            href="{{ route('transaction.payment.create', ['transaction' => $transaction->id]) }}"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Pay">
                                            <i class="fas fa-money-bill-wave-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="15" class="text-center">
                                        There's no data in this table
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $transactions->onEachSide(2)->links('template.paginationlinks') }}
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Have any account?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-sm btn-primary m-1"
                            href="{{ route('transaction.reservation.createIdentity') }}">No, create
                            new account!</a>
                        <a class="btn btn-sm btn-success m-1"
                            href="{{ route('transaction.reservation.pickFromCustomer') }}">Yes, use
                            their account!</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
