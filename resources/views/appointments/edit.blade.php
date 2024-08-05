@extends('adminlte::page')

@section('title', 'Edit Appointment')

@section('content_header')
    <h1>Edit Appointment</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="doctor_id">Doctor</label>
                    <select name="doctor_id" class="form-control" required>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ $doctor->id == $appointment->doctor_id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="patient_id">Patient</label>
                    <select name="patient_id" class="form-control" required>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" {{ $patient->id == $appointment->patient_id ? 'selected' : '' }}>{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" value="{{ $appointment->date }}" required>
                </div>
                <div class="form-group">
                    <label for="time">Time</label>
                    <input type="time" name="time"  class="form-control" value="{{old('time' , $appointment->time?? '' )  }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control">{{ $appointment->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Appointment</button>
            </form>
        </div>
    </div>
@stop