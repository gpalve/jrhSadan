@extends('template.master')
@section('title', 'Dashboard')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
    @endif
<div class="container">
  <form action="/add-member/{{$customer->id}}" method="post">
   @csrf                                
    
    
    <div class="card-body">
        <div class="card-header text-center">
          Enter Details For Family Member of {{$customer->name}}
          </div> <br>
          <input type="hidden" name="customer_id" value="{{$customer->id}}">
      <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name"
                placeholder="Enter Name" >
        </div>
    </div>
    

    <div class="row mb-3">
        <label for="relation" class="col-sm-2 col-form-label">Relation</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="relation" name="relation"
                placeholder="Enter Relation" >
        </div>
    </div>

    <div class="row mb-3">
        <label for="age" class="col-sm-2 col-form-label">Age</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="age" name="age"
                placeholder="Enter Age" >
        </div>
    </div>
 </div>


   <input type="submit" name="submit" class="btn btn-primary mx-auto text-white" value="Add Member">
  </form>
</div>

  @endsection