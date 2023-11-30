@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Division Details</h3>
            </div>
            <div class="card-body">
                <form>
                    @csrf
                     <h1>Division Details</h1>
                     <p><strong>Name:</strong> {{ $division->division_name }}</p>
                     <p><strong>Description:</strong> {{ $division->description }}</p>
                
       
            </div>
@endsection
