
@extends('adminlte::page')

@section('title', 'welcome')

 
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Edit Rating</title>
    <style>
        
        body {
 
 background-color: #bbbb;
 background-image: url("tt.jpg");
 background-size: cover;
         }
        .edit-form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .edit-form label {
            font-weight: bold;
        }

        .edit-form input[type="text"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .edit-form button {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <div class="edit-form">
        <h2>Edit Rating</h2>
        @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
        <form method="post" action="{{ route('update_rating', $rating->id) }} ">
        @csrf
        <div>
            <label for="doctor_id">doctor</label>
            <select name="doctor_id" id="doctor_id">
                @foreach ( $doctors as $doctor )
                <option value="{{ $doctor->id }}" >{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>
    <br>
    <br>
        <div>
            <label for="patient_id">patient</label>
            <select name="patient_id" id="patient_id">
                @foreach ( $patients as $patient )
                <option value="{{ $patient->id  }}" >{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>
    
    <br>
    <br>
    <label for="name">rate</label>
    <br>
    <input type="text" name="rate" value="{{ $rating->rate }} "/>
    <br>
    <label for="name">comment</label>
    <br>
    <input type="text" name="comment" value="{{ $rating->comment }} "/>

     
    <input type ="submit" value="save">
</form>
    </div>
</body>
</html>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop