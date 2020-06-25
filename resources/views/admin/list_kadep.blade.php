@extends('layout.main')

@section('title', 'List Kepala Departemen')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <div class="card-title">
                        <h2 class="text-center">Daftar Kepala Departemen</h2>
                        <hr>
                        @if(session('sukses'))
                            <div class="alert alert-success">{{ session('sukses') }}</div>
                        @endif
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-cyan" data-toggle="modal" data-target="#exampleModal">
                            Tambah Kepala Departemen
                        </button>
                    </div>
                    <table class="table table-striped table-bordered" id="data-table">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>No. HP</th>
                                <th>Departemen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kepala_departemen as $kadep)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kadep->nama }}</td>
                                <td>{{ $kadep->nim }}</td>
                                <td>{{ $kadep->user->email }}</td>
                                <td>{{ $kadep->alamat }}</td>
                                <td>+62{{ $kadep->no_hp }}</td>
                                <td>{{ $kadep->departemen->nama_departemen }}</td>
                                <td>
                                    <a href="/kadep/{{ $kadep->id }}/ubah" class="btn btn-sm btn-cyan">Ubah</a>
                                    <a onclick="return confirm('apakah anda yakin ingin menghapus {{ $kadep->nama }} dari Kepala Departemen?')" href="/kadep/{{ $kadep->id }}/hapus" class="btn btn-sm btn-danger">Hapus</a>
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
                <form action="/kadep/create" method="post">
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
                      <label for="email">Email</label>
                      <input value="{{ old('email') }}" type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Masukkan email">
                      @if($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input value="{{ old('alamat') }}" type="text" name="alamat" id="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" placeholder="Masukkan alamat">
                      @if($errors->has('alamat'))
                      <div class="invalid-feedback">Alamat Harus diisi</div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="no_hp">No. HP/WA</label>
                      <input value="{{ old('no_hp') }}" type="number" name="no_hp" id="no_hp" class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" placeholder="Masukkan No. Hp/WA">
                      @if($errors->has('no_hp'))
                      <div class="invalid-feedback">No.Hp harus diisi</div>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="departemen"></label>
                      <select required class="form-control {{ $errors->has('departemen_id') ? 'is-invalid' : '' }}" name="departemen_id" id="departemen">
                        <option value="">-- Pilih Departemen --</option>
                        @foreach ($departemen as $dpt)
                        <option {{ (old('departemen_id')== $dpt->id) ? 'selected' : '' }} value="{{ $dpt->id }}">{{ $dpt->nama_departemen }}</option>
                        @endforeach
                      </select>
                      @if($errors->has('departemen_id'))
                      <div class="invalid-feedback">Departemen ini sudah diambil</div>
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
