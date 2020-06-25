@extends('layout.main')

@section('title', 'Departemen')

@section('container')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body  table-responsive">
                    <div class="card-title">
                        <h2 class="text-center">Daftar Departemen</h2>
                        @if(session('sukses'))
                        <div class="alert alert-success">{{ session('sukses') }}</div>
                        @endif
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-cyan" data-toggle="modal" data-target="#exampleModal">
                            Tambah Departemen
                        </button>
                    </div>
                    <table class="table table-striped table-bordered" id="data-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Departemen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departemen as $dpt)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dpt->nama_departemen }}</td>
                                <td>
                                    <a href="/departemen/{{ $dpt->id }}/ubah" class="btn btn-sm btn-cyan">Ubah</a>
                                    <a onclick="return confirm('Apakah anda yakin ingin menghapus {{ $dpt->nama_departemen }}?')" href="/departemen/{{ $dpt->id }}/hapus" class="btn btn-sm btn-danger">Hapus</a>
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Departemen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="/departemen/create" method="post">
                @csrf
                <div class="form-group">
                  <label for="nama_departemen">Nama Departemen</label>
                  <input type="text" name="nama_departemen" id="nama_departemen" class="form-control {{ $errors->has('nama_departemen') ? 'is-invalid' : '' }}" placeholder="Masukkan Nama Departemen">
                  @if($errors->has('nama_departemen'))
                  <div class="invalid-feedback">Nama Departemen Harus diisi</div>
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
