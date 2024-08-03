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
    <form action="{{Route("appointments")}}" method="post">
        @csrf
        <input type="date" name="date" id="" placeholder="Select a specific date">
        <input type="submit" value="search">
        
    </form>
    
    <h1>Appointments for {{$date}}</h1>
    <br>
    @stop

    @section('content')
    
    

    <div class="card-body p-0">
        <div class="table-responsive">
            @if (!$collection)
            <br>
            <h2>There are no appointments for {{$date}} 🥱</h2>
                
            @else
                
            @foreach ($collection as $doctor =>$appointments)
            
            <h5>Dr.{{ucfirst($doctor)}} : </h5>
            <table class="table m-0">
                <thead>
                    <tr>
                        <th>Appointment ID</th>
                        <th>patient</th>
                        <th>date</th>
                        <th>time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                    {{-- @dd($appointment) --}}
                        
                    <tr>
                        <td>{{$appointment->id}}</td>
                        <td>{{$appointment->Patient->name}}</td>
                        <td>{{$appointment->date}}</td>
                        <td>{{$appointment->time}}</td>
                        <td style="color:{{($appointment->state)?"green":"red"}}">{{($appointment->state)?"attend":"not attend"}}</td>
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