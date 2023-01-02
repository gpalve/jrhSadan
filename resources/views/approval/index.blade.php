@extends('template.master')
@section('title', 'Dashboard')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">

<p>{{ $message }}</p>
</div>
@endif
<div class="row my-2 mt-4 ms-1">
    <div class="col-lg-12">
        <h5>Approval Pending: </h5>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-hover">
                        <thead>
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
                                <td>{{ $pendingTransaction->getDateDifferenceWithPlural($pendingTransaction->check_in, $pendingTransaction->check_out) }}
                                </td>
                                <td>{{ $pendingTransaction->customer->ref }}
                                </td>
                                <td>
                                    {{ $pendingTransaction->customer->diagnosis }}
                                </td>
                                <td>Ward -{{$pendingTransaction->customer->ward }} Cot - {{$pendingTransaction->customer->cot}}</td>
                                <td>{{$pendingTransaction->customer->job }}</td>
                                <td>{{$pendingTransaction->customer->umid }}</td>
                                   {{--  <td>
                                        <a class="btn btn-light btn-sm rounded shadow-sm border p-1 m-0 {{$pendingTransaction->getTotalPrice() - $pendingTransaction->getTotalPayment() <= 0 ? 'disabled' : ''}}"
                                            href="{{ route('transaction.payment.create', ['transaction' => $pendingTransaction->id]) }}"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Pay">
                                            <i class="fas fa-money-bill-wave-alt"></i>
                                        </a>
                                    </td> --}}
                                    <td>
                                      
                
                                        <a class="btn btn-primary" href="{{ route('customer.approve', $pendingTransaction->id ) }}"><font color="white"> Approve</a> 
                                           {{-- <a class="btn btn-primary" href="{{ route('ExistingUser.approve') }}">Approve</a>  --}}
                                           <a class="btn btn-danger" href="{{ route('customer.reject', $pendingTransaction->id ) }}"><font color="white">Reject</a> 
                                           {{-- <a class="btn btn-primary" href="{{ route('ExistingUser.approve') }}">Approve</a>  --}}
                                         
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
                  
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection
