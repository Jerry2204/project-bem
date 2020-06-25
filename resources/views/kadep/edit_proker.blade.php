@extends('layout.main')

@section('title', 'Ubah Proker')

@section('header')
<link rel="stylesheet" type="text/css" href="/assets/libs/quill/dist/quill.snow.css">
<style>
    .ck-editor__editable {
    min-height: 300px;
    }

    .card{
        min-height: 550px
    }

</style>
@endsection

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="text-center">Ubah Program Kerja {{ $departemen->nama_departemen }}</h2>
                        <hr>
                        @if(session('sukses'))
                        <div class="alert alert-success">{{ session('sukses') }}</div>
                        @endif
                    </div>
                    <form action="/proker/update/{{ $departemen->id }}" method="post">
                        @csrf
                        <div class="form-group">
                        <label for="program_kerja">Program Kerja</label>
                        <textarea class="form-control" name="program_kerja" rows="3" id="editor">{!! $departemen->program_kerja !!}</textarea>
                        </div>
                        <button type="submit" class="btn btn-cyan">Ubah Program Kerja</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('footer')
        <script src="{{ asset('asset/js/ckeditor.js') }}"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    @endsection
@endsection
