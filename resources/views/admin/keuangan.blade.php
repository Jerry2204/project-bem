@extends('layout.main')

@section('title', 'Keuangan')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="text-center">Data Keuangan BEM</h2>
                        @if(session('sukses'))
                        <div class="alert alert-success">{{ session('sukses') }}</div>
                        @endif
                        <hr>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-cyan" data-toggle="modal" data-target="#exampleModal">
                            Tambah Keuangan
                        </button>

                    </div>
                    <p>Total Pemasukan : <strong>Rp.{{ number_format($total, 0, ',', '.') }}</strong></p>
                    <table class="table table-bordered" id="data-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No.</th>
                                <th>Jumlah Bayar</th>
                                <th>Tanggal Bayar</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keuangan as $uang)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>Rp.{{ number_format($uang->jumlah_bayar, 0, ',', '.') }}</td>
                                <td>@php
                                    $tanggal = date_create($uang->tanggal_bayar);
                                    echo date_format($tanggal, "d M Y");
                                @endphp </td>
                                <td>{{ $uang->kelas->nama_kelas }}</td>
                                <td>
                                    <a href="/keuangan/{{ $uang->id }}/edit" class="btn btn-sm btn-cyan">edit</a>
                                    <a onclick="return confirm('apakah anda yakin ingin menghapus data?')" href="/keuangan/{{ $uang->id }}/hapus" class="btn btn-sm btn-danger">hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Keuangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/keuangan/create" method="post">
                    @csrf
                    <div class="form-group">
                    <label for="jumlah_bayar">Jumlah Pembayaran</label>
                    <input value="{{ old('jumlah_bayar') }}" type="text" name="jumlah_bayar" id="jumlah_bayar" class="form-control {{ $errors->has('jumlah_bayar') ? 'is-invalid' : '' }}" name="jumlah_bayar" placeholder="Masukkan Jumlah Bayar" autocomplete="off">
                    @if($errors->has('jumlah_bayar'))
                    <div class="invalid-feedback">Jumlah Bayar Harus diisi</div>
                    @endif
                    </div>
                    <div class="form-group">
                      <label for="tanggal_bayar">Tanggal Bayar</label>
                      <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control {{ $errors->has('tanggal_bayar') ? 'is-invalid' : '' }}" placeholder="Masukkan Tanggal Pembayaran">
                      @if($errors->has('tanggal_bayar'))
                      <div class="invalid-feedback">Tanggal Pembayaran harus diisi</div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="kelas_id">Kelas</label>
                      <select class="form-control {{ $errors->has('kelas_id') ? 'is-invalid' : '' }}" name="kelas_id" id="kelas_id">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($kelas as $kls)
                        <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('kelas_id'))
                      <div class="invalid-feedback">Kelas Harus diisi</div>
                      @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-cyan">Tambah</button>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection
