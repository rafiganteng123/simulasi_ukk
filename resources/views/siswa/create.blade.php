@extends('template')

@section('content')

    <div class="row mt-5 mb-5">
        <div class="col-lg-12">
            <div class="float-start">
                <h2>Input Data Siswa Eligible</h2>
            </div>
            <div class="float-end">
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Wahh</strong> Input Data Siswa Eligible Error.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="container">
            <form action="{{ route('siswa.store') }}" method="POST">
            @csrf
            @method('POST')

                <div class="row col-5">
                    <div class="input-group mb-3">
                        <div class="form-floating">
                          <input type="number" name="NIS" class="form-control" id="floatingInputGroup1" placeholder="NIS">
                          <label for="floatingInputGroup1">NIS</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-floating">
                          <input type="text" name="Nama" class="form-control" id="floatingInputGroup1" placeholder="Nama">
                          <label for="floatingInputGroup1">Nama</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-floating">
                          <input type="text" name="kelas_jurusan" class="form-control" id="floatingInputGroup1" placeholder="Kelas & Jurusan">
                          <label for="floatingInputGroup1">Kelas & Jurusan</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    
@endsection