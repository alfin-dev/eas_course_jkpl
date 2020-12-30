@extends('layouts.master')

@section('title','Query 3')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All instructors teaching year 1 courses</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Course Designation</th>
                        <th>Class Room</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($p as $key => $d)
                    <tr>
                        <td>{{$key +1 }}</td>
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->title}}</td>
                        <td>{{$d->classroom}}</td>
                        
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection