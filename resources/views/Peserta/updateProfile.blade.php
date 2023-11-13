@extends('template.base')

@section('title', 'Profile Peserta')

@section('content')
<!-- Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Profile, {{ Auth::user()->username}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Profile Peserta</a></li>
                    <li class="breadcrumb-item active">Profile {{ Auth::user()->username}}</li>
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


                    <form action="{{ route('peserta.update.profile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" id="name" name="name" class="form-control "  value="{{ $user->name}}">

                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control "  value="{{ $user->username}}">

                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" class="form-control "  value="{{ $user->email}}">

                                <label for="telepon">Nomor Telepon</label>
                                <input type="text" id="telepon" name="telepon" class="form-control "  value="{{ $user->telepon}}">

                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control "  value="{{ $user->tanggal_lahir}}">
                                
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" id="pekerjaan" name="pekerjaan" class="form-control "  value="{{ $user->pekerjaan}}">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
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