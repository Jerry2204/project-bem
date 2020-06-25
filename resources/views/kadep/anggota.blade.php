@extends('layout.main')

@section('title', 'Anggota')

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
                        <h2 class="text-center">Anggota {{ $departemen->nama_departemen }}</h2>
                        <hr>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-cyan" data-toggle="modal" data-target="#exampleModal">
                            Tambah Anggota
                        </button>
                    </div>
                    @if(session('sukses'))
                    <div class="alert alert-success">{{ session('sukses') }}</div>
                    @endif
                    <table class="table table-striped table-bordered" id="data-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Program Studi</th>
                                <th>No. HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $agt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $agt->nama }}</td>
                                <td>{{ $agt->nim }}</td>
                                <td>{{ $agt->prodi }}</td>
                                <td>+62{{ $agt->no_hp }}</td>
                                <td>
                                    <a href="/anggota/{{ $agt->id }}/ubah" class="btn btn-sm btn-cyan">Ubah</a>
                                    <a href="" class="btn btn-sm btn-danger">Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Anggota Departemen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/anggota/create/{{ $departemen->id }}" method="post">
                    @csrf
                    <div class="form-group">
                    <label for="nama">Nama</label>
                    <input value="{{ old('nama') }}" type="text" name="nama" id="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama" placeholder="Masukkan Nama" autocomplete="off">
                    @if($errors->has('nama'))
                    <div class="invalid-feedback">Nama Harus diisi</div>
                    @endif
                    </div>
                    <div class="form-group">
                      <label for="nim">NIM</label>
                      <input value="{{ old('nim') }}" type="text" name="nim" id="nim" class="form-control {{ $errors->has('nim') ? 'is-invalid' : '' }}" placeholder="Masukkan NIM">
                        @if($errors->has('nim'))
                        <div class="invalid-feedback">NIM Harus diisi</div>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="prodi">Program Studi</label>
                      <input value="{{ old('prodi') }}" type="text" name="prodi" id="prodi" class="form-control {{ $errors->has('prodi') ? 'is-invalid' : '' }}" placeholder="Masukkan prodi">
                        @if($errors->has('prodi'))
                        <div class="invalid-feedback">Program Studi Harus diisi</div>
                        @endif
                    </div>
                    <div class="form-group">
                      <label for="no_hp">No. HP/WA</label>
                      <input value="{{ old('no_hp') }}" type="number" name="no_hp" id="no_hp" class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" placeholder="Masukkan No. Hp/WA">
                      @if($errors->has('no_hp'))
                      <div class="invalid-feedback">No.Hp harus diisi</div>
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
