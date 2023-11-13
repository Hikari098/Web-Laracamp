@extends('template.base')

@section('title', 'Form Edit Product')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Edit Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Data Product</a></li>
                    <li class="breadcrumb-item active">Form Product</li>
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


                    <form action="{{ route('Product.update', $product->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_produk">Nama Product</label>
                                <input type="text" id="nama_produk" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukkan Nama Product" value="{{ $product->nama_produk}}" >
                            </div>
                            @error('nama_produk')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="image">Image Product</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="image" value="{{ $product->image}}">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            @error('image')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="kategori_id">Kategori Product</label>
                                <select class="custom-select form-control-border" name="kategori_id" id="kategori_id" @error('kategori_id') is-invalid @enderror>
                                    <option value="{{ $product->kategori_id}}">{{ $product->kategori->kategori_id}}</option>
                                    @foreach ($kategori as $row)
                                    <option value="{{ $row->id }}" {{ old('kategori_id') == $row->id ? 'selected' : '' }}>
                                        {{ $row->kategori_id }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('kategori_id')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror


                            <div class="form-group">
                                <label for="harga">Harga Product</label>
                                <input type="text" id="harga" name="harga" class="form-control @error('harga') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukkan harga Product" value="{{ $product->harga}}">
                            </div>
                            @error('harga')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Product</label>
                                <textarea @error('deskripsi') is-invalid @enderror class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Enter ..." value="{{ $product->deskripsi}}">{{ $product->deskripsi}}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </div>



                    </form>

                </div>


            </div>

        </div>
    </div>
    </div>
</section>

<!-- End Main Content -->

@endsection

@section('ckEditor')

<script>
    ClassicEditor
        .create(document.querySelector('#artikel'))
        .catch(error => {
            console.error(error);
        });
</script>

@endsection