@extends('layout.main')

@section('title', 'Ubah Departemen')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="text-center">Ubah Data Departemen</h2>
                        <hr>
                    </div>
                    <form action="/departemen/update/{{ $departemen->id }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="nama_departemen">Nama Departemen</label>
                          <input type="text" value="{{ $departemen->nama_departemen }}" name="nama_departemen" id="nama_departemen" class="form-control {{ $errors->has('nama_departemen') ? 'is-invalid' : '' }}" placeholder="Masukkan Nama Departemen">
                          @if($errors->has('nama_departemen'))
                          <div class="invalid-feedback">Nama Departemen Harus diisi</div>
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
