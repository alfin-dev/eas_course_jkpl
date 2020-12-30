@extends('layouts.master')

@section('title','Query 5')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All courses that have labs with more than 1 section</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Desig</th>
                        <th>Title</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($q5 as $key => $d)
                    <tr>
                        <td>{{$key +1 }}</td>
                        <td>{{$d->desig}}</td>
                        <td>{{$d->title}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection