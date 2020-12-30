@extends('layouts.master')

@section('title','Query 2')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Student in Year 1</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($hsil as $key => $d)
                    <tr>
                        <td>{{$key +1 }}</td>
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        @if($d->status == "P")
                            <td>Passed</td>
                        @elseif($d->status == "F")
                            <td>Failed</td>
                        @elseif($d->status == "R")
                            <td>Registered</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection