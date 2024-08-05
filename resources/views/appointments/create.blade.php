@extends('adminlte::page')

@section('title', 'Create Appointment')

@section('content_header')
    <h1>Create Appointment</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="doctor_id">Doctor</label>
                    <select name="doctor_id" class="form-control" required>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="patient_id">Patient</label>
                    <select name="patient_id" class="form-control" required>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" name="time" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Appointment</button>
            </form>
        </div>
    </div>
@stop