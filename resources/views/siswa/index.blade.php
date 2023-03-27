@extends('template')

@section('content')

    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>Daftar Siswa Eligible</h2>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $message }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
    @endif

    <table class="table table-bordered">
        <tr>
            <th class="text-center" width="20px">No</th>
            <th class="text-center" width="280px">NIS</th>
            <th class="text-center" width="280px">Nama</th>
            <th class="text-center" width="280px">Kelas & Jurusan</th>
            <th class="text-center" width="280px">Custom Siswa Elgible</th>
        </tr>
        @foreach ($siswas as $siswa)
        <tr>
            <td class="text-center">{{ $loop->index +1 }}</td>
            <td>{{ $siswa->NIS }}</td>
            <td>{{ $siswa->Nama}}</td>
            <td>{{ $siswa->kelas_jurusan }}</td>
            <td class="text-center">
                <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ route('siswa.show', $siswa->id) }}" class="btn btn-info btn-sm">Tampil</a>
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Data Siswa?')">Hapus</button>
                </form>
            </td>
        </tr>
            
        @endforeach
    </table>
        <div class="float-end">
            <a href="{{ route('siswa.create') }}" class="btn btn-success">Input Siswa</a>
        </div>
    
        {!! $siswas->links() !!}

@endsection