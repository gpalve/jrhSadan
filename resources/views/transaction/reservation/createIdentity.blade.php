@extends('template.master')
@section('title', 'Create Identity')
@section('head')
    <link rel="stylesheet" href="{{ asset('style/css/progress-indication.css') }}">
@endsection
@section('content')
    @include('transaction.reservation.progressbar')
    <div class="container mt-3">
        <div class="row justify-content-md-center">
            <div class="col-lg-12">
                <div class="card shadow-sm border">
                    <div class="card-header">
                        <h2>Add Patient Details</h2>
                    </div>
                    <div class="card-body p-3">
                        <form class="row g-3" method="POST" action="{{ route('transaction.reservation.storeCustomer') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <label for="name" class="form-label">Patient Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="pname" class="form-label"> Primary Attendant Name</label>
                                <input type="text" class="form-control @error('pname') is-invalid @enderror" id="pname"
                                    name="pname" value="{{ old('pname') }}">
                                @error('pname')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="ref" class="form-label"> Referred By Doctor Name  </label>
                                <input type="text" class="form-control @error('ref') is-invalid @enderror" id="ref"
                                    name="ref" value="{{ old('ref') }}">
                                @error('ref')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="letter_num" class="form-label"> Ref. Letter Number dt.  </label>
                                <input type="text" class="form-control @error('letter_num') is-invalid @enderror" id="letter_num"
                                    name="letter_num" value="{{ old('letter_num') }}">
                                @error('letter_num')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="relation" class="form-label"> Relationship with patient </label>
                                <input type="text" class="form-control @error('relation') is-invalid @enderror" id="relation"
                                    name="relation" value="{{ old('relation') }}">
                                @error('relation')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="ward" class="form-label"> Patient Ward Number / OPD </label>
                                <input type="text" class="form-control @error('ward') is-invalid @enderror" id="ward"
                                    name="ward" value="{{ old('ward') }}">
                                @error('ward')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="cot" class="form-label"> Patient Cot Number (Oprtional if not Admitted) </label>
                                <input type="text" class="form-control @error('cot') is-invalid @enderror" id="cot"
                                    name="cot" value="{{ old('cot') }}">
                                @error('cot')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="diagnosis" class="form-label">Diagnosis & Remarks </label>
                                <input type="text" class="form-control @error('diagnosis') is-invalid @enderror" id="diagnosis"
                                    name="diagnosis" value="{{ old('diagnosis') }}">
                                @error('diagnosis')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" " id=" email"
                                    name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="umid" class="form-label">UMID Number</label>
                                <input type="text" class="form-control @error('umid') is-invalid @enderror"
                                    id="umid" name="umid" value="{{ old('umid') }}">
                                @error('umid')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender" aria-label="Default select example">
                                    {{-- <option selected hidden>Select</option> --}}
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gender')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="job" class="form-label">Designation</label>
                                <input type="text" class="form-control @error('job') is-invalid @enderror" id="job"
                                    name="job" value="{{ old('job') }}">
                                @error('job')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address"
                                    rows="3">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-mg-12">
                                <label for="avatar" class="form-label">Profile Picture</label>
                                <input class="form-control" type="file" name="avatar" id="avatar">
                                @error('avatar')
                                    <div class="text-danger mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn myBtn shadow-sm border float-end">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
