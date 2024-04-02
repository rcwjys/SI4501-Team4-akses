<!-- Import Template -->
@extends('src.Template.main-template')

<!-- Set Title Halaman -->
@section('title', 'Akses')

<!-- Set class active -->
@section('check', 'active')

<!-- Import Layouting -->
@section('content')
<main>
  <main>
    <div class="container mt-5">
        @if(Session::has('ticket-request-success') && Session::has('ticket'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('ticket-request-success') . " | " . "Berikut Merupakan Nomor Tiket Anda: " . Session::get('ticket')}}
            </div>
        @endif
        <div class="card">
            <div class="card-header text-capitalize">
                formulir Cek Status Verifikasi Institusi Kesehatan
            </div>
            <form action="/health-institution/status" method="POST" class="px-5 py-5" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Institusi</label>
                    <input type="text" placeholder="Contoh: BNTlDvTH660beca4f03ff" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="institution_ticket" required maxlength="21">
                </div>
                <button type="submit" name="submit" class="btn btn-primary submit-button mt-3">Cek Status</button>
            </form>
        </div>
    </div>
</main>
@endsection