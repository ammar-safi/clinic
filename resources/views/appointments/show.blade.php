@extends('adminlte::page')

@section('title', 'Show Appointment')

@section('content_header')
    <h1>Appointment Details</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <p><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
            <p><strong>Patient:</strong> {{ $appointment->patient->name }}</p>
            <p><strong>Date:</strong> {{ $appointment->date }}</p>
            <p><strong>Time:</strong> {{ $appointment->time }}</p>
            <p><strong>Description:</strong> {{ $appointment->description }}</p>
            <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back to Appointments</a>
        </div>
    </div>
@stop