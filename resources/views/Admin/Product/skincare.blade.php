@extends('template.base')

@section('title', 'Product')
@section('content')

<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Product</li>
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
                        <a href="{{ route('Product.create')}}" class="btn btn-primary btn-md">Add Product</a>
                        <a href="{{ route('produk.skincare')}}" class="btn bg-fuchsia btn-md">Add Skincare</a>
                        <a href="#" class="btn bg-gradient-blue btn-md">Add Bodycare</a>
                        <a href="#" class="btn  bg-gradient-cyan btn-md">Add Haircare</a>
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
                                    <th>Kategori</th>
                                    <th>Nama Product</th>
                                    <th>Harga</th>
                                    <th>Slug</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $row)
                                <tr>
                                    <td>
                                        <!-- kalau tulisan terspace dibaca teks -->
                                        <a href="{{ route('Product.edit', $row->id)}}" class="btn btn-warning"><i class="fa-solid fa-pencil"></i></a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $row->id}}"><i class="fa-solid fa-trash"></i></a>
                                        
                                    </td>
                                    <td>


                                        <!-- {{-- ngeluarin foto pakai cara pertama --}} -->
                                        <img src="{{ url('img') . '/' . $row->image }}" alt="{{ $row->nama_product }}" class="img-fluid">


                                        <!-- {{-- ngeluarin foto pakai cara kedua --}} -->
                                        <!-- <img src="{{ asset('storage/' . $row->img_artikel) }}" alt="{{ $row->title }}" class="img-fluid"> -->


                                    </td>
                                    <td>{{ $row->kategori->kategori_id ?? ''}}</td>
                                    <td>{{ $row->nama_produk }}</td>
                                    <td>{{ $row->harga }}</td>
                                    <td>{{ $row->slug }}</td>
                                    <td>
                                        <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#show{{ $row->id}}"><i class="fa-solid fa-eye"></i></a>
                                    </td>



                                </tr>

                                @include('Admin.Product.deleteProduct')
                                @include('Admin.Product.showProduct')
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