@extends('template.master')
@section('title', 'Customer')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>{{ $customer->name }}</h3>
            </div>
            <div class="card-body">
                <div class="row g-0 bg-light position-relative">
                    <div class="col-md-4 mb-md-0 p-md-4">
                        <img src="{{ $customer->user->getAvatar() }}" class="w-100" alt="...">
                    </div>
                    <div class="col-md-8 p-2 ps-md-0">
                        <h3>Details </h3> <hr>
                        <ul>Designation- {{ $customer->job }}</ul>
                        <ul> Diagnosis- {{ $customer->diagnosis }}  </ul>
                        <ul> Ward - {{ $customer->ward }}  </ul>
                        <ol> Cot {{ $customer->cot }}  </ol>
                        <ol> Attendant - {{ $customer->pname }}  </ol>
                        <ol> Gender -{{ $customer->gender }}  </ol>
                        <ol> UMID - {{ $customer->umid }}  </ol>
                        <ul>Address -{{ $customer->address }} </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
