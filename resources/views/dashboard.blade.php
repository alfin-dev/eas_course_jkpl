@extends('layouts.master')

@section('title','Dashboard')
@section('content')

@if(session('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
@endif
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Number of Students</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stud }}</div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Number of Staff</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $staf }}</div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Number of Courses
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> {{ $cour }}</div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Number of Instructors</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $inst }}</div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <!-- Illustrations -->
                    {{-- <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">About</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                            src="{{ asset('/sbadmin/img/undraw_posting_photo.svg')}}" alt="">
                                    </div>
                                    <p>Aplikasi ini tentang pendaftaran kursus yang dilakukan selama 4 tahun.</p>
                                </div>
                            </div> --}}
                            @if(session('error'))
                                <div class="alert alert-danger">{{session('error')}}</div>
                            @endif
                            <form action="coba1" method="post">
                            @csrf
                            @if($query)
                            {{-- <textarea name="querycoba" id="1" cols="30" rows="10"></textarea> --}}
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                {{-- <textarea name="querycoba" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $query }}</textarea> --}}
                                <input type="text" name="querycoba" class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{$query}}">

                                {{-- <input type="text" name querycoba value="{{$query}}"> --}}
                            </div>
                            @else
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                <input type="text" name="querycoba" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Tulis Query Disini">
                                {{-- <input type="text" name querycoba> --}}

                            </div>
                            @endif
                            <button class="btn btn-primary" type="submit">GO</button>
                            </form>
                            <br>
                            <p>To search use this syntax "select all from what r u looking for :  <br>Example : select all from student<br>
                            --Student<br>
                            --y1course<br>
                            --person<br>
                            --course</p>


                            @if($ins)
                            <table class="table">
                                <thead class="thead-light">
                                  <tr>
                                    @foreach ($ins as $key => $value)
                                        @foreach ($value as $key => $value1)
                                    <th scope="col">{{$key}}</th>
                                        @endforeach
                                        @break
                                    @endforeach
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($ins as $item)
                                    <tr>
                                    @foreach ($item as $s)
                                        <td>{{$s}}</td>
                                    @endforeach
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @else
                            <table class="table">
                                <thead class="thead-light">
                                  <tr>
                                    <th scope="col">Judul</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Isi</td>
                                    </tr>
                                </tbody>
                            </table>
                            @endif
@endsection