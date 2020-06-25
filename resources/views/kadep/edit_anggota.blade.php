@extends('layout.main')

@section('title', 'Ubah data anggota')

@section('container')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2 class="text-center">Ubah Data Anggota</h2>
                    <hr>
                    @if(session('sukses'))
                    <div class="alert alert-success">{{ session('sukses') }}</div>
                    @endif
                </div>
                <form action="/anggota/{{ $anggota->id }}/update" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input value="{{ $anggota->nama }}" type="text" name="nama" id="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama" placeholder="Masukkan Nama" autocomplete="off">
                        @if($errors->has('nama'))
                        <div class="invalid-feedback">Nama Harus diisi</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input value="{{ $anggota->nim }}" type="text" name="nim" id="nim" class="form-control {{ $errors->has('nim') ? 'is-invalid' : '' }}" placeholder="Masukkan NIM">
                        @if($errors->has('nim'))
                        <div class="invalid-feedback">NIM Harus diisi</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="prodi">Program Studi</label>
                        <input value="{{ $anggota->prodi }}" type="text" name="prodi" id="prodi" class="form-control {{ $errors->has('prodi') ? 'is-invalid' : '' }}" placeholder="Masukkan prodi">
                        @if($errors->has('prodi'))
                        <div class="invalid-feedback">Program Studi Harus diisi</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No. HP/WA</label>
                        <input value="0{{ $anggota->no_hp }}" type="number" name="no_hp" id="no_hp" class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" placeholder="Masukkan No. Hp/WA">
                        @if($errors->has('no_hp'))
                        <div class="invalid-feedback">No.Hp harus diisi</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-cyan">Ubah Data</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
