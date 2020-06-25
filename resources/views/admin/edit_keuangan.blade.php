@extends('layout.main')

@section('title', 'Ubah Data Keuangan')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="text-center">Ubah Data keuangan</h2>
                        <hr>
                    </div>
                        <form action="/keuangan/{{ $keuangan->id }}/update" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="jumlah_bayar">Jumlah Pembayaran</label>
                                <input value="{{ $keuangan->jumlah_bayar }}" type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control {{ $errors->has('jumlah_bayar') ? 'is-invalid' : '' }}" name="jumlah_bayar" placeholder="Masukkan Jumlah Bayar" autocomplete="off">
                                @if($errors->has('jumlah_bayar'))
                                <div class="invalid-feedback">Jumlah Bayar Harus diisi</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="tanggal_bayar">Tanggal Bayar</label>
                                <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control {{ $errors->has('tanggal_bayar') ? 'is-invalid' : '' }}" value="{{ $keuangan->tanggal_bayar }}" placeholder="Masukkan Tanggal Pembayaran">
                                @if($errors->has('tanggal_bayar'))
                                <div class="invalid-feedback">Tanggal Pembayaran harus diisi</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="kelas_id">Kelas</label>
                                <select class="form-control {{ $errors->has('kelas_id') ? 'is-invalid' : '' }}" name="kelas_id" id="kelas_id">
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach ($kelas as $kls)
                                    <option {{ ($keuangan->kelas->id == $kls->id) ? 'selected' : '' }} value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('kelas_id'))
                                <div class="invalid-feedback">Kelas Harus diisi</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-cyan">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
