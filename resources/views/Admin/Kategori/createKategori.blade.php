@extends('template.base')

@section('title', 'Form Kategori')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Kategori</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"> <a href="{{ route('Kategori.index')}}">Data Kategori</a></li>
                    <li class="breadcrumb-item active">Form Kategori</li>
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


                    <form action="{{ route('Kategori.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <input type="text" id="kategori_id" name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" id="exampleInputEmail1" placeholder="Masukkan Judul Artikel">
                            </div>
                            @error('kategori_id')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror


                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <textarea @error('slug') is-invalid @enderror class="form-control" id="slug" name="slug" rows="3" placeholder="Enter ..."></textarea>
                                @error('slug')
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