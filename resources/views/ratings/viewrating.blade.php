@extends('adminlte::page')

@section('title', 'welcome')

 
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Rating</title>
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
    <h1>Rating</h1>

 
   
        <table>
            <tr>
                <th>Doctor</th>
                <th>patient</th>
                <th>Rate</th>
                <th>Comment</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>{{ $ratings1->Doctors->name }}</td>
                <td>{{ $avgrate }}</td>
            @foreach ($reviews as $review)  
                
                    <td>{{ $review->patient_name }}</td>
                    <td>{{  $review->rating}}</td>
                    <td>{{  $review->comment }}</td>
                   
                    @endforeach  
                    <td>
                        <a class="edit-link" href="{{ route('edit_rating', $rating->id) }} ">Edit</a>
                        <a class="delete-link" href=" {{ route('delete_rating', $rating->id) }} ">Delete</a>
                    </td>
                </tr>
           
        </table>
     
</body>
</html>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop