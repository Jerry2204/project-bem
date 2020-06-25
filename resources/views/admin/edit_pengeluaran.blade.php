@extends('layout.main')

@section('title', 'Ubah Pengeluaran')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="text-center">Ubah Data Pengeluaran</h2>
                        <hr>
                    </div>
                    <form action="/pengeluaran/{{ $pengeluaran->id }}/update" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="jumlah_uang">Jumlah Uang</label>
                            <input value="{{ $pengeluaran->jumlah_uang }}" type="number" name="jumlah_uang" id="jumlah_uang" class="form-control {{ $errors->has('jumlah_uang') ? 'is-invalid' : '' }}" name="jumlah_uang" placeholder="Masukkan Jumlah Uang" autocomplete="off">
                            @if($errors->has('jumlah_uang'))
                            <div class="invalid-feedback">Jumlah Uang Harus diisi</div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="keperluan">Keperluan</label>
                            <input value="{{ $pengeluaran->keperluan }}" type="text" name="keperluan" id="keperluan" class="form-control {{ $errors->has('keperluan') ? 'is-invalid' : '' }}" name="keperluan" placeholder="Masukkan Keperluan" autocomplete="off">
                            @if($errors->has('keperluan'))
                            <div class="invalid-feedback">Keperluan Harus diisi</div>
                            @endif
                        </div>
                        <div class="form-group">
                          <label for="tanggal">Tanggal Bayar</label>
                          <input type="date" value="{{ $pengeluaran->tanggal }}" name="tanggal" id="tanggal" class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" placeholder="Masukkan Tanggal">
                          @if($errors->has('tanggal'))
                          <div class="invalid-feedback">Tanggal harus diisi</div>
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
