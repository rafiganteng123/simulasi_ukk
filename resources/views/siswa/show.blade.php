@extends('template')

@section('content')

    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Tampil Data Siswa</h2>
            </div>
            <div class="float-end">
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>

    <div class="row col-5">
        <div class="mb-3">
            <div class="form-group">
                <strong>NIS : </strong> {{ $siswa->NIS }}
            </div>
        <div class="mb-3">
            <div class="form-group">
                <strong>Nama : </strong> {{ $siswa->Nama }}
            </div>
        <div class="mb-3">
            <div class="form-group">
                <strong>Kelas & Jurusan : </strong> {{ $siswa->kelas_jurusan }}
            </div>
        </div>
    </div>

    
@endsection