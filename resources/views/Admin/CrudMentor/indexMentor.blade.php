@extends('template.base')

@section('title', 'Data Mentor')
@section('content')

<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Mentor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Mentor</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- ENd Header -->

<!-- Main Content -->

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.form.data.mentor') }}" class="btn btn-primary btn-md">Add Mentor</a>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <form action="#" method="get">
                                    <div class="input-group-append">
                                        <input type="search" name="search" class="form-control float-right" placeholder="Search">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <!-- Alert Create-->
                        @if(Session::get('Create'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('Create') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                        @endif
                        <!-- End Alert Create -->

                        {{-- Alert Update --}}
                        @if(Session::get('Update'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ Session::get('Update') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                        @endif
                        {{-- End Alert Update --}}

                        {{-- Alert Delete --}}
                        @if(Session::get('Delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('Delete') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                        </div>
                        @endif
                        {{-- End Alert Delete --}}

                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th width="10%">Image</th>
                                    <th>Nama Mentor</th>
                                    <th>Username Mentor</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mentor as $row)
                                <tr>
                                    <td>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $row->id}}"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                    <td>


                                        <!-- {{-- ngeluarin foto pakai cara pertama --}} -->
                                        <img src="{{ url('img') . '/' . $row->img }}" alt="{{ $row->name }}" class="img-fluid">


                                        <!-- {{-- ngeluarin foto pakai cara kedua --}} -->
                                        <!-- <img src="{{ asset('storage/' . $row->img_artikel) }}" alt="{{ $row->title }}" class="img-fluid"> -->


                                    </td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->username }}</td>
                                    <td>{{ $row->email}}</td>


                                </tr>
                                @include('Admin.CrudMentor.deleteMentor')
                              
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<!-- End Main Content -->


@endsection