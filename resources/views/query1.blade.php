@extends('layouts.master')

@section('title','Query 1')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Students</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($student as $key => $d)
                    <tr>
                        <td>{{$key +1 }}</td>
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->year}}</td>
                        <td><a href="/cari/{{$d->id}}" class="btn btn-primary text-center" > SEARCH </a></td>      
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--  -->



@endsection