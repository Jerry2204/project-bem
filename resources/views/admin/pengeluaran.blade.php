@extends('layout.main')

@section('title', 'Pengeluaran')


@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="text-center">Data Pengeluaran</h2>
                        <hr>
                        @if(session('sukses'))
                        <div class="alert alert-success">{{ session('sukses') }}</div>
                        @endif
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-cyan" data-toggle="modal" data-target="#exampleModal">
                            Tambah Pengeluaran
                        </button>
                    </div>
                    <p class="float-right">Total Pengeluaran : <strong>Rp.{{ number_format($total, 0, ',', '.') }}</strong></p>
                    <div style="clear: both"></div>
                    <p class="float-right">Saldo Kas : <strong>Rp.{{ number_format($sisa, 0, ',', '.') }}</strong></p>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="data-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Jumlah Uang</th>
                                    <th>Keperluan</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengeluaran as $keluar)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>Rp.{{ number_format($keluar->jumlah_uang, 0, ',', '.') }}</td>
                                    <td>{{ $keluar->keperluan }}</td>
                                    <td>
                                        @php
                                        $tanggal = date_create($keluar->tanggal);
                                        echo date_format($tanggal, "d M Y");
                                        @endphp
                                    </td>
                                    <td>
                                        <a href="/pengeluaran/{{ $keluar->id }}/edit" class="btn btn-sm btn-cyan">Edit</a>
                                        <a onclick="return confirm('Apakah anda yakin akan menghapus data?')" href="/pengeluaran/{{ $keluar->id }}/hapus" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengeluaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/pengeluaran/create" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="jumlah_uang">Jumlah Uang</label>
                        <input value="{{ old('jumlah_uang') }}" type="number" name="jumlah_uang" id="jumlah_uang" class="form-control {{ $errors->has('jumlah_uang') ? 'is-invalid' : '' }}" name="jumlah_uang" placeholder="Masukkan Jumlah Uang" autocomplete="off">
                        @if($errors->has('jumlah_uang'))
                        <div class="invalid-feedback">Jumlah Uang Harus diisi</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="keperluan">Keperluan</label>
                        <input value="{{ old('keperluan') }}" type="text" name="keperluan" id="keperluan" class="form-control {{ $errors->has('keperluan') ? 'is-invalid' : '' }}" name="keperluan" placeholder="Masukkan Keperluan" autocomplete="off">
                        @if($errors->has('keperluan'))
                        <div class="invalid-feedback">Keperluan Harus diisi</div>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="tanggal">Tanggal Bayar</label>
                      <input type="date" name="tanggal" id="tanggal" class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" placeholder="Masukkan Tanggal">
                      @if($errors->has('tanggal'))
                      <div class="invalid-feedback">Tanggal harus diisi</div>
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
