@extends('layouts.master')

@section('title','KEMEMS')
@section('content')

<p>pepek</p>
<table>
<thead>
<th>No.</th>
<th>ID</th>
<th>Nama</th>
<th>status</th>
</thead>
<tbody>
@foreach ($data as $key => $d)
<tr>
<td>{{$key +1 }}</td>
<td>{{$d->id}}</td>
<td>{{$d->name}}</td>
</tr>
@endforeach
</tbody>
</table>

@endsection