<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>


    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')
    <h1>show all reports</h1>
    @stop

    @section('content')
    <div class="card-body p-0">
        <div class="table-responsive">
            @if (!$report)
                <br>
                <h2>There are no report yet</h2>

            @else


                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Report ID</th>

                            <th>Appointment ID</th>
                            <th>Patient name</th>
                            <th>Description</th>

                        </tr>
                    </thead>

                    <tbody>


                        <tr>

                            <td>{{$report->id}}</td>
                            <td>{{$report->appointment_id}}</td>
                            <td>{{$report->Appointment->Patient->name}}</td>
                            <td>{{$report->description}}</td>
                            <td><button> <a href="{{route('editreport', ['id' => $report->id])}}">edite</a></button> -
                               <button> <a href="{{route('deletreport', ['id' => $report->id])}}">delete</a></button> 
                            </td>
                        </tr>
                        </tr>


                    </tbody>
                </table>
                <br><br><br>
            @endif


        </div>@stop

        @section('css')
        {{-- Add here extra stylesheets --}}
        <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
        <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
        @stop
</body>

</html>