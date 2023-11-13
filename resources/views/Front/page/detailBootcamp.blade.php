@extends('Front.baseFront')
@section('title', 'Detail Bootcamp')

@section('content')
<!-- Checkout Bootcamp -->
<section class="container checkout-bootcamp">
    <span>YOUR FUTURE CAREER</span>
    <h2>Checkout Bootcamp</h2>
</section>
<!-- End Checkout Bootcamp -->


<!-- Detail Checkout -->
<section class="container detail-checkout">
    <div class="row">

        <div class="col-md-6 left-content">
            <div class="p-5">
                <div class="video">
                    <img class="img-fluid" src="{{ asset('storage/' . $bootcamp->thumbnail) }}" alt="{{ $bootcamp->nama }}">
                </div>
                <div class="desc">
                    <span>{{ $bootcamp->nama }}</span>
                    <p>
                        {!! $bootcamp->deskripsi !!}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6 right-content d-flex justify-content-center">
            <form action="{{ route('front.daftar.bootcamp') }}" method="POST" class="mt-4">
                @csrf


                <input type="hidden" value="{{ $bootcamp->id}}" name="bootcamp_id">
                @guest
                <input type="hidden" name="peserta_id" id="peserta_id">
                @else
                <input type="hidden" value="{{ Auth::user()->id}}" name="peserta_id">
                @endguest
                <input type="hidden" value="{{ $bootcamp->harga}}" name="total_harga">

                

                <div class="mb-3 inputan">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Masuakan Email Anda !" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 inputan">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masuakan Nama Lengkap Anda !">
                </div>
                <div class="mb-3 inputan">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Masuakan Pekerjaan Anda !">
                </div>
                <div class="mb-3 inputan">
                    <label for="rekening" class="form-label">Nomor Rekening</label>
                    <input type="text" class="form-control" name="rekening" id="rekening" placeholder="Masuakan Nomor Rekening Anda !">
                </div>

                <div class="row">
                    <div class="col-md-3 inputan-2">
                        <div class="mb-3">
                            <label for="Expired" class="form-label">Expired</label>
                            <input type="text" class="form-control" name="expired" id="Expired" placeholder="Tanggal Expired !">
                        </div>
                    </div>
                    <div class="col-md-3 inputan-2">
                        <div class="mb-3 jarak">
                            <label for="cvc" class="form-label">CVC</label>
                            <input type="text" class="form-control" name="cvc" id="cvc" placeholder="220">
                        </div>
                    </div>
                </div>

                @guest
                <!-- Sebelum Login -->
                <a href="#" class="btn btn-primary">Silahkan Melakukan Login</a>
                @else
                @if(Auth::user()->role == 3)
                <button type="submit" class="btn btn-primary">Play Now</button>
                <p class="pay">
                    Your payment is secure and encrypted.
                </p>
                @else
                <button type="submit" class="btn btn-primary">Anda Tidak Bisa Mendaftar</button>
                @endif
                @endguest
            </form>
        </div>

    </div>
</section>
<!-- End Detail Checkout -->

@endsection