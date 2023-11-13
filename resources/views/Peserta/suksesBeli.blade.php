@extends('Front.baseFront')
@section('title', 'Sukses Beli')
@section('content')
 <!-- Gambar Sukses -->
 <section class="container text-center success">
        <img src="{{ asset('laracamp/images/ill_checkout.png')}}" alt="Success" class="img-fluid">
    </section>
    <!-- End Gambar Sukses -->

    <section class="container back">
        <span>WHAT A DAY!</span>
        <h2>Berhasil Checkout</h2>
        <a href="{{ route('peserta.index')}}" class="btn btn-dashoard">My Dashboard</a>
    </section>
@endsection

