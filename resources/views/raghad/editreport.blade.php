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
    <h1>add report</h1>
    @stop

    @section('content')
<form method="post" action="{{ route('reportedit' , ["id"=>$data->id]) }}">
    @csrf

    <div class="card-body">
        <div class="form-group">
            <label for="inputName">Appointment id</label>
            <input type="text" id="inputName" class="form-control" name="appointmentid" value="{{$data->appointment_id}}">
        </div>
        <div class="form-group">
            <label for="inputDescription"> Description</label>
            <textarea id="inputDescription" class="form-control" rows="4" name="Description" value="{{$data->description}}"></textarea>
        </div>


        <div class="col-12">
            <input type="submit" value="Edit Report" class="btn btn-success float-right">
        </div>
</form>
        @stop

        @section('css')
        {{-- Add here extra stylesheets --}}
        <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
        <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
        @stop
</body>

</html>
