@extends('layout.main')

@section('title', 'Dashboard')

@section('header')
<style>
    .card{
        min-height: 0;
    }
    .wraper{
        min-height: 600px;
    }
    .jumlah_heading{
        color: white;
    }
</style>
@endsection

@section('container')

    @if(auth()->user()->role == 'admin')
    <h2 class="text-center">Selamat Datang Administrator</h2>
    @endif
    @if(auth()->user()->role == 'kadep')
    <h2 class="text-center">Selamat Datang Kepala {{ auth()->user()->kadep->departemen->nama_departemen }}</h2>
    <hr>
    @endif

    <hr>

    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                    <h6 class="text-white">Departemen</h6>
                    <h6 class="text-white">{{ $jumlah_departemen }}</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="fas fa-user"></i></h1>
                    <h6 class="text-white">Kepala Departemen</h6>
                    <h6 class="text-white">{{ $jumlah_kadep }}</h6>
                </div>
            </div>
        </div>
            <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                    <h6 class="text-white">Kelas</h6>
                    <h6 class="text-white">{{ $jumlah_kelas }}</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                    <h6 class="text-white">Admin</h6>
                    <h6 class="text-white">{{ $jumlah_admin }}</h6>
                </div>
            </div>
        </div>
    </div>
@endsection
