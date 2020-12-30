@extends('layouts.master')

@section('title','Query 4')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List designation of all courses that have tutorials</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Classroom Tutorial</th>
                        <th>Section</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($des as $key => $d)
                    <tr>
                        <td>{{$key +1 }}</td>
                        <td>{{$d->title}}</td>
                        <td>{{$d->classroom}}</td>
                        <td>{{$d->section}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection