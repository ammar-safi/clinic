@extends('adminlte::page')

@section('title', 'welcome')

 
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Ratings</title>
    <style>
      
        body {
 
 
            background-image: url("tt.jpg");
            background-size: cover;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .edit-link,
        .delete-link {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border-radius: 3px;
        }

        .delete-link {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <h1>Ratings</h1>

 
   
        <table>
            <tr>
                <th>Doctor</th>
                <th>Patient</th>
                <th>Rate</th>
                <th>Comment</th>
                <th>Action</th>
            </tr>
            {{-- @dd($ratings) --}}
            @foreach( $ratings as $rating )
                <tr>
                    
                    <td>{{ $rating->doctor->name }}</td>
                    <td>{{ $rating->patient->name }}</td>
                    <td>{{ $rating->rate }}</td>
                    <td>{{ $rating->comment }}</td>
                    <td>
                        <a class="edit-link" href="{{ route('edit_rating', $rating->id) }} ">Edit</a>
                        <a class="delete-link" href=" {{ route('delete_rating', $rating->id) }} ">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('rating-add') }}">Add rate</a>
</body>
</html>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop