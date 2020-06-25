@extends('layout.main')

@section('title', 'Ubah Data Kelas')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="text-center">Ubah Data Kelas</h2>
                        <hr>
                    </div>
                    <form action="/kelas/{{ $kelas->id }}/update" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="nama_kelas">Nama kelas</label>
                          <input type="text" value="{{ $kelas->nama_kelas }}" name="nama_kelas" id="nama_kelas" class="form-control {{ $errors->has('nama_kelas') ? 'is-invalid' : '' }}" placeholder="Masukkan Nama Kelas">
                          @if($errors->has('nama_kelas'))
                            <div class="invalid-feedback">Nama Kelas Harus Diisi</div>
                          @endif
                        </div>
                        <div class="form-group">
                          <label for="jumlah_mahasiswa">Jumlah Mahasiswa</label>
                          <input type="number" value="{{ $kelas->jumlah_mahasiswa }}" name="jumlah_mahasiswa" id="jumlah_mahasiswa" class="form-control {{ $errors->has('jumlah_mahasiswa') ? 'is-invalid' : '' }}" placeholder="Masukkan Jumlah Mahasiswa">
                          @if($errors->has('jumlah_mahasiswa'))
                            <div class="invalid-feedback">Jumlah Mahasiswa Harus Diisi</div>
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
