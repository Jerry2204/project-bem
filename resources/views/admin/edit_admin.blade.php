@extends('layout.main')

@section('title', 'Ubah Data Admin')

@section('header')

    <style>
        .card{
            min-height: 550px;
        }
    </style>

@endsection

@section('container')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="text-center">Ubah Data Admin</h2>
                        <hr>
                    </div>
                    <form action="/admin/{{ $admin->id }}/update" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input value="{{ $admin->name }}" type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Masukkan Nama" autocomplete="off">
                            @if($errors->has('name'))
                            <div class="invalid-feedback">Nama Harus diisi</div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-cyan">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
