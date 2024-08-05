<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    {{-- @dd($collection) --}}
    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
    <form action="{{ route('appointments.index') }}" method="post">
        @csrf
        <input type="date" name="date" id="" placeholder="Select a specific date">
        <input type="submit" value="search">
    </form>
    
    <h1>Appointments for {{ $date }}</h1>
    <br>
    @stop

    @section('content')
    
    <div class="card-body p-0">
        <div class="table-responsive">
            @if (!$collection)
            <br>
            <h2>There are no appointments for {{ $date }} 🥱</h2>
            @else
            @foreach ($collection as $doctor => $appointments)
            <h5>Dr.{{ ucfirst($doctor) }} : </h5>
            <table class="table m-0">
                <thead>
                    <tr>
                        <th>Appointment ID</th>
                        <th>Patient</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->patient->name }}</td>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td style="color:{{ $appointment->state ? 'green' : 'red' }}">{{ $appointment->state ? 'attend' : 'not attend' }}</td>
                        <td>
                            <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-info btn-sm">Show</a>
                            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br><br><br>    
            @endforeach
            @endif
        </div>
        @stop

        @section('css')
        {{-- Add here extra stylesheets --}}
        {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
        @stop

        @section('js')
        <script>
            console.log("Hi, I'm using the Laravel-AdminLTE package!");
        </script>
        @stop

</body>

</html>