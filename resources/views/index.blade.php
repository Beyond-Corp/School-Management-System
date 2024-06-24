@extends('layout')

@section('content')
<h3> Students List </h3>

<div class="table-wrapper">

    <table class="fl-table" >

    <thead><tr><th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Section</th>
    <th>image</th>
    <th>Show</th>
    <th>Update</th>
    <th>Delete</th>
    </tr></thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
        <td>{{$student->id}}</td>
        <td>{{$student->name}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->phone}}</td>
        <td>{{$student->section}}</td>
        <td> <img src = "/image/{{$student->image}}" width="96" height="96"/></td>

        <td>
            <form method="POST" action="">
                <a class="btn btn-info" href="{{ route ('students.show' ,$student->id) }}"> Show </a>
            </form>
        </td>

        <td>
            <form method="POST" action="">
                <a class="btn btn-primary" href="{{ route ('students.edit' ,$student->id) }}"> Update </a>
            </form>
        </td>

        <td>
            <form method="POST" action="">
                <a class="btn btn-danger" href="{{ route ('students.destroy' ,$student->id) }}"> Delate </a>
            </form>
        </td>


    </tr>
    @endforeach
</tbody>
    </table>
</div>






<!-- Getion des erreurs -->

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection()
