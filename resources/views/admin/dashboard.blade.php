
@extends('admin.app')
@section('title','Admin Dashboard')


@section('content')

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


<div class="container">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter infouser">
        <i class="fa fa-code-fork"></i>
        <span class="count-numbers">{{ auth()->user()->count()}}</span>
        <span class="count-name">Total User</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter primary-2">
        <i class="fa fa-ticket"></i>
        @php

         $admin = auth()->user()->where('role','1')->count();
         @endphp
        <span class="count-numbers">{{$admin}}</span>
        <span class="count-name"> Total Admin</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter danger-3">
        <i class=""></i>
        @php
        $manager = auth()->user()->where('role','2')->count();
        @endphp
        <span class="count-numbers">{{$manager}}</span>
        <span class="count-name text-colur">Total Manager</span>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card-counter success-4">
        <i class=""></i>
        @php
        $hrmanager = auth()->user()->where('role','3')->count();
        @endphp
        <span class="count-numbers">{{$hrmanager }}</span>
        <span class="count-name">Total Hr Manager</span>
      </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card-counter info-5">
              <i class="fa fa-code-fork"></i>
             
              <span class="count-numbers">{{$totalEmployee}}</span>
              <span class="count-name">Total Employee</span>
            </div>
          </div>
    </div>
</div>
@endsection

