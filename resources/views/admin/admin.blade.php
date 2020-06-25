@extends('layout.main')

@section('title', 'Daftar Admin')

@section('container')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="text-center">Daftar Admin</h2>
                        <hr>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-cyan" data-toggle="modal" data-target="#exampleModal">
                            Tambah Admin
                        </button>
                    </div>
                    @if(session('sukses'))
                    <div class="alert alert-success">
                        {{ session('sukses') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered" id="data-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admin as $adm)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $adm->name }}</td>
                                    <td>{{ $adm->email }}</td>
                                    <td>
                                        <a href="/admin/{{ $adm->id }}/edit" class="btn btn-sm btn-cyan">Edit</a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data {{ $adm->name }}?')" href="/admin/{{ $adm->id }}/hapus" class="btn btn-sm btn-danger">Hapus</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/create" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input value="{{ old('name') }}" type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Masukkan Nama" autocomplete="off">
                        @if($errors->has('name'))
                        <div class="invalid-feedback">Nama Harus diisi</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="{{ old('email') }}" type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Masukkan Email" autocomplete="off">
                        @if($errors->has('email'))
                        <div class="invalid-feedback">Email Harus diisi</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input value="{{ old('password') }}" type="password" name="password" id="password" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Masukkan Password" autocomplete="off">
                        @if($errors->has('password'))
                        <div class="invalid-feedback">Password Harus diisi</div>
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
