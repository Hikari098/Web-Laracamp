@extends('template.base')

@section('title', 'Form Bootcamp')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Edit Bootcamp</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"> <a href="{{ route('Bootcamp.index')}}">Data Bootcamp</a></li>
                    <li class="breadcrumb-item active">Form Edit Bootcamp</li>
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


                    <form action="{{ route('Bootcamp.update', $bootcamp->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama Bootcamp</label>
                                <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1" value="{{ $bootcamp->nama }}">
                            </div>
                            @error('nama')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="thumbnail">Image Bootcamp</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" class="custom-file-input @error('thumbnail') is-invalid @enderror" id="thumbnail" value="{{ $bootcamp->thumbnail }}">
                                        <label class="custom-file-label" for="thumbnail">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            @error('thumbnail')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="kategori_id">Kategori Bootcamp</label>
                                <select class="custom-select form-control-border" name="kategori_id" id="kategori_id" @error('kategori_id') is-invalid @enderror>
                                    <option value="{{ $bootcamp->kategori_id }}">value="{{ $bootcamp->kategori->kategori_id }}</option>
                                    @foreach ($kategori_id as $row)
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
                                <label for="mentor_id">Nama Mentor</label>
                                <select class="custom-select form-control-border" name="mentor_id" id="mentor_id" @error('mentor_id') is-invalid @enderror>
                                    <option value="{{ $bootcamp->mentor_id }}">value="{{ $bootcamp->mentor->mentor_id }}</option>
                                    @foreach ($mentor_id as $row)
                                    <option value="{{ $row->id }}" {{ old('mentor_id') == $row->id ? 'selected' : '' }}>
                                        {{ $row->mentor_id }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('mentor_id')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" id="harga" name="harga" class="form-control @error('harga') is-invalid @enderror" id="exampleInputEmail1" value="{{ $bootcamp->harga }}">
                            </div>
                            @error('harga')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror


                            <div class="form-group">
                                <label for="kuota">Kuota</label>
                                <input type="text" id="kuota" name="kuota" class="form-control @error('kuota') is-invalid @enderror" id="exampleInputEmail1" value="{{ $bootcamp->kuota }}">
                            </div>
                            @error('kuota')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Bootcamp</label>
                                <textarea @error('deskripsi') is-invalid @enderror class="form-control" id="deskripsi" name="deskripsi" rows="3" value="{{ $bootcamp->deskripsi }}">{{ $bootcamp->deskripsi }}</textarea>
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