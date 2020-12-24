@extends('layouts.master')

@section('title','KEMEMS')
@section('content')

<p>pepek</p>
<table>
<thead>
{{-- <th>No.</th> --}}
<th>ID</th>
<th>Nama</th>
{{-- <th>status</th> --}}
</thead>
<tbody>
@foreach ($data as $d)
<td>$d->id</td>
<td>$d->name</td>
@endforeach
</tbody>
</table>

@endsection