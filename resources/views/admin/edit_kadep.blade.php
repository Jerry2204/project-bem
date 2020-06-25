@extends('layout.main')

@section('title', 'Ubah Data Kadep')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="text-center">Ubah Data Kepala Departemen</h2>
                        <hr>
                    </div>
                    <form action="/kadep/{{ $kadep->id }}/update" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input value="{{ $kadep->nama }}" type="text" name="nama" id="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama" placeholder="Masukkan Nama" autocomplete="off">
                                @if($errors->has('nama'))
                                <div class="invalid-feedback">Nama Harus diisi</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input value="{{ $kadep->nim }}" type="text" name="nim" id="nim" class="form-control {{ $errors->has('nim') ? 'is-invalid' : '' }}" placeholder="Masukkan NIM">
                                @if($errors->has('nim'))
                                <div class="invalid-feedback">NIM Harus diisi</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input value="{{ $kadep->alamat }}" type="text" name="alamat" id="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" placeholder="Masukkan alamat">
                                @if($errors->has('alamat'))
                                <div class="invalid-feedback">Alamat Harus diisi</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No. HP/WA</label>
                                <input value="0{{ $kadep->no_hp }}" type="number" name="no_hp" id="no_hp" class="form-control {{ $errors->has('no_hp') ? 'is-invalid' : '' }}" placeholder="Masukkan No. Hp/WA">
                                @if($errors->has('no_hp'))
                                <div class="invalid-feedback">No.Hp harus diisi</div>
                                @endif
                            </div>
                            <div class="form-group">
                              <label for="departemen"></label>
                              <select required class="form-control {{ $errors->has('departemen_id') ? 'is-invalid' : '' }}" name="departemen_id" id="departemen">
                                <option value="">-- Pilih Departemen --</option>
                                @foreach ($departemen as $dpt)
                                <option {{ ($kadep->departemen_id == $dpt->id) ? 'selected' : '' }} value="{{ $dpt->id }}">{{ $dpt->nama_departemen }}</option>
                                @endforeach
                                </select>
                                @if($errors->has('departemen_id'))
                                <div class="invalid-feedback">Departemen ini sudah diambil</div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-cyan">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
