@extends('template.base')

@section('title', 'Kategori Bootcamp')

@section('content')

<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Kategori Bootcamp</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Kategori Bootcamp</li>
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
                        <a href="#" class="btn btn-primary btn-md" type="button" data-toggle="modal" data-target="#modal-default">
                            Add Kategori Bootcamp
                        </a>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <form action="" method="get">
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
                        <!-- Alert Create -->
                        @if(Session::get('Create'))

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get('Create')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <!-- Alert Update -->

                        @if(Session::get('Update'))

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{Session::get('Update')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <!-- End Alert Update -->

                        <!-- Alert Delete -->

                        @if(Session::get('Delete'))

                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{Session::get('Delete')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <!-- End Alert Delete -->

                        <!-- End Alert Create -->
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kategori Bootcamp</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($kategori as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->kategori}}</td>
                                    <td>{{$row->slug}}</td>
                                    <td>
                                        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#edit{{ $row->id}}">Edit</a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $row->id}}">Delete</a>

                                    </td>
                                   

                                </tr>
                                @include('Admin.KategoriBootcamp.updateKb')
                                @include('Admin.KategoriBootcamp.deleteKb')
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

<!-- {{-- modal --}} -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambahkan Data Kategori Bootcamp</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kategoriBootcamp.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori Bootcamp</label>
                        <input type="text" id="kategori" name="kategori" class="form-control" required>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>

    </div>
</div>

@endsection