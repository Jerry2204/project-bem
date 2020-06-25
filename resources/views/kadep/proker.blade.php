@extends('layout.main')

@section('title', 'Program Kerja')

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
                        <h2 class="text-center">Program Kerja {{ $departemen->nama_departemen }}</h2>
                        <hr>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-cyan" data-toggle="modal" data-target="#exampleModal">
                            Buat Program Kerja
                        </button>
                        @if(!empty($departemen->program_kerja))
                        <a href="/proker/edit/{{ $departemen->id }}" class="btn btn-cyan">Ubah Program Kerja</a>
                        @endif
                        @if(session('sukses'))
                        <div class="mt-3 alert alert-success">{{ session('sukses') }}</div>
                        @endif
                    </div>
                    <h5>Program Kerja {{ $departemen->nama_departemen }}</h5>
                    {!! $departemen->program_kerja !!}
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Program Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/proker/create/{{ $departemen->id }}" method="post">
                    @csrf
                    <div class="form-group">
                      <label for="program_kerja">Program Kerja</label>
                      <textarea required class="form-control {{ $errors->has('program_kerja') ? 'is-invalid' : '' }}" name="program_kerja" rows="10" id="editor">
                      </textarea>
                      @if($errors->has('program_kerja'))
                      <div class="invalid-feedback">Program Kerja Harus Diisi</div>
                      @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-cyan">Buat</button>
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
