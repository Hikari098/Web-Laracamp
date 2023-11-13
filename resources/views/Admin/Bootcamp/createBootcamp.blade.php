@extends('template.base')

@section('title', 'Form Bootcamp')

@section('content')
    <!-- Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Form bootcamp</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><a href="#">Data Bootcamp</a></li>
                        <li class="breadcrumb-item active">Form Bootcamp</li>
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


                        <form action="{{ route('Bootcamp.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Bootcamp</label>
                                    <input type="text" id="nama" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror" id="exampleInputEmail1"
                                        placeholder="Masukkan Nama Bootcamp">
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
                                            <input type="file" name="thumbnail"
                                                class="custom-file-input @error('thumbnail') is-invalid @enderror"
                                                id="thumbnail">
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
                                    <select class="custom-select form-control-border" name="kategori_id" id="kategori_id"
                                        @error('kategori_id') is-invalid @enderror>
                                        <option>Pilih Kategori Bootcamp</option>
                                        @foreach ($kategori as $row)
                                            <option value="{{ $row->id }}"
                                                {{ old('kategori_id') == $row->id ? 'selected' : '' }}>
                                                {{ $row->kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('kategori_id')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="mentor_id">Nama Mentor Bootcamp</label>
                                    <select class="custom-select form-control-border" name="mentor_id" id="mentor_id"
                                        @error('mentor_id') is-invalid @enderror>
                                        <option>Pilih Nama Mentor</option>
                                        @foreach ($mentor as $row)
                                            <option value="{{ $row->id }}"
                                                {{ old('mentor_id') == $row->id ? 'selected' : '' }}>
                                                {{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('mentor_id')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="kuota">Kuota Bootcamp</label>
                                    <input type="text" id="kuota" name="kuota"
                                        class="form-control @error('kuota') is-invalid @enderror" id="exampleInputEmail1"
                                        placeholder="Masukkan kuota Bootcamp">
                                </div>
                                @error('kuota')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="harga">Harga Bootcamp</label>
                                    <input type="number" id="harga" name="harga"
                                        class="form-control @error('harga') is-invalid @enderror" id="exampleInputEmail1"
                                        placeholder="Masukkan harga Bootcamp">
                                </div>
                                @error('harga')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi Bootcamp</label>
                                    <textarea @error('deskripsi') is-invalid @enderror class="form-control" id="deskripsi" name="deskripsi" rows="3"
                                        placeholder="Enter ..."></textarea>
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