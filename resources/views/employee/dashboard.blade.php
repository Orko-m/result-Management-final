
@extends('employee.app')
@section('title','Employee Dashboard')


@section('content')
    <div class="row match-height">      
<div class="container">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-code-fork"></i>
        <span class="count-numbers">{{$present}}</span>
        <span class="count-name">Present - {{ $date }}</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-ticket"></i>
        <span class="count-numbers">{{ $absent}}</span>
        <span class="count-name">Absent - {{ $date }}</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success">
        <i class=""></i>
        <span class="count-numbers">{{ $leave}}</span>
        <span class="count-name text-colur">Leave - {{ $date }}</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter info">
        <i class=""></i>
        <span class="count-numbers">{{ $offday}}</span>
        <span class="count-name">Off Day - {{ $date }}</span>
      </div>
    </div>
  </div>
</div>
 </div>

@endsection
