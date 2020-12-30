@extends('layouts.master')

@section('title','Query 1')
@section('content')

<a href="/query-1" class="btn btn-primary mb-5">BACK</a>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Studi Tahun Pertama</h6>
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
                        <th>Year</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($l1 as $key => $d)
                    <tr>
                        <td>{{$key +1 }}</td>
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->title}}</td>
                        <td>{{$d->year}}</td>
                        
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


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Studi Tahun Kedua</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Course Designation</th>
                        <th>Year</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($l2 as $key => $d)
                    <tr>
                        <td>{{$key +1 }}</td>
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->title}}</td>
                        <td>{{$d->year}}</td>
                        
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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Studi Tahun Ketiga</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Course Designation</th>
                        <th>Year</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($l3 as $key => $d)
                    <tr>
                        <td>{{$key +1 }}</td>
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->title}}</td>
                        <td>{{$d->year}}</td>
                        
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
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Studi Tahun Keempat</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Course Designation</th>
                        <th>Year</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($l4 as $key => $d)
                    <tr>
                        <td>{{$key +1 }}</td>
                        <td>{{$d->id}}</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->title}}</td>
                        <td>{{$d->year}}</td>
                        
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