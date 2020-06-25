@extends('layout.main')

@section('title', 'Daftar Kelas')

@section('container')
    <div class="row">
        <div class="col-lg-12 table-responsive">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="text-center">Daftar Kelas</h2>
                        <hr>
                        @if(session('sukses'))
                        <div class="alert alert-success">{{ session('sukses') }}</div>
                        @endif
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-cyan" data-toggle="modal" data-target="#exampleModal">
                            Tambah Kelas
                        </button>
                    </div>
                    <table class="table table-bordered" id="data-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No.</th>
                                <th>Nama Kelas</th>
                                <th>Jumlah Mahasiswa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $kls)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kls->nama_kelas }}</td>
                                <td>{{ $kls->jumlah_mahasiswa }}</td>
                                <td>
                                    <a href="/kelas/{{ $kls->id }}/edit" class="btn btn-sm btn-cyan">Edit</a>
                                    <a href="/kelas/{{ $kls->id }}/hapus" onclick="return confirm('apakah anda yakin ingin menghapus kelas {{ $kls->nama_kelas }}?')" class="btn btn-sm btn-danger">Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kepala Departemen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/kelas/create" method="post">
                    @csrf
                    <div class="form-group">
                    <label for="nama_kelas">Nama kelas</label>
                    <input value="{{ old('nama_kelas') }}" type="text" name="nama_kelas" id="nama_kelas" class="form-control {{ $errors->has('nama_kelas') ? 'is-invalid' : '' }}" name="nama_kelas" placeholder="Masukkan Nama kelas" autocomplete="off">
                    @if($errors->has('nama_kelas'))
                    <div class="invalid-feedback">Nama kelas Harus diisi</div>
                    @endif
                    <div class="form-group">
                      <label for="jumlah_mahasiswa">Jumlah Mahasiswa</label>
                      <input type="text" name="jumlah_mahasiswa" id="jumlah_mahasiswa" class="form-control {{ $errors->has('jumlah_mahasiswa') ? 'is-invalid' : '' }}" placeholder="Masukkan Jumlah Mahasiswa">
                      @if($errors->has('jumlah_mahasiswa'))
                      <div class="invalid-feedback">Jumlah Mahasiswa harus diisi</div>
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
