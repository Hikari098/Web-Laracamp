@extends('template.base')

@section('title', 'Transaksi Bootcamp')

@section('content')

<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Transaksi Bootcamp</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Transaksi Bootcamp</li>
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
                                    <th>Kode Transaksi</th>
                                    <th>Nama</th>
                                    <th>Nama Bootcamp</th>
                                    <th>Total Bayar</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaksi as $row)
                                <tr>


                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row->kode_transaksi}}</td>
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->bootcamp->nama}}</td>
                                    <td>{{$row->total_harga}}</td>
                                    <td>
                                        @if($row->status == 1)
                                        <span class="badge badge-success">Sukses</span>
                                        @elseif($row->status == 2)
                                        <span class="badge badge-warning">Pending</span>
                                        @elseif($row->status == 3)
                                        <span class="badge badge-danger">Batal</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="#" class="btn btn-success" title="Ubah Status Pembayaran" data-toggle="modal" data-target="#updateStatus{{$row->id}}"><i class="fa-solid fa-eye"></i></a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$row->id}}"><i class="fa-solid fa-trash"></i></a>
                                    </td>

                                </tr>
                                @include('Admin.Transaksi.hapusTransaksi')
                                @include('Admin.Transaksi.ubahStatus')

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