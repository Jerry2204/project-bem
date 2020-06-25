@extends('layout.main')

@section('title', 'Pengaturan Akun')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="text-center">Pengaturan Akun</h2>
                        @if(session('sukses'))
                        <div class="alert alert-success">{{ session('sukses') }}</div>
                        @endif
                    </div>
                    <form action="/account_setting/update/{{ $user->id }}" method="post">
                        @csrf
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" placeholder="Masukkan Email">
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password baru">
                        </div>
                        <button type="submit" class="btn btn-cyan">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
