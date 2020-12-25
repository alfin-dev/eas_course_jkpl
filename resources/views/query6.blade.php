@extends('layouts.master')

@section('title','Query 6')
@section('content')

@extends('layouts.master')

@section('title','Query 4')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> List names of instructors that teach at least one course with multiple sections
 labs</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($ins as $key => $d)
                    <tr>
                        <td>{{$key +1 }}</td>
                        <td>{{$d->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@endsection