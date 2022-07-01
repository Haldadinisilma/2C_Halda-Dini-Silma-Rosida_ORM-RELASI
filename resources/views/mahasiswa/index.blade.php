@extends('mahasiswa.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mt-2">
<h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
</div>
<div class="float-right my-2">
<a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
</div>
<div class="row">
        <div class="col-md-6 mt-5">
            <form action="{{ url('mahasiswa-search')}}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                  </div>
            </form>
        </div>

    </div>
</div>
    @if ($message = Session::get('success'))

    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Nim</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th width="280px">Action</th>
        </tr>
    @foreach ($mahasiswa as $mhs)
<tr>
    <td>{{ $mhs ->nim }}</td>
    <td>{{ $mhs ->nama }}</td>
    <td>{{ $mhs ->kelas->nama_kelas }}</td>
    <td>{{ $mhs ->jurusan }}</td>
    <td>{{ $mhs ->email }}</td>
    <td>{{ $mhs ->alamat }}</td>
    <td>{{ $mhs ->tl }}</td>
    <td>
        <form action="{{ route('mahasiswa.destroy',['mahasiswa'=>$mhs->nim]) }}" method="POST">
            <a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->nim) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mhs->nim) }}">Edit</a>
            <a class="btn btn-warning" href="{{ route('mahasiswa.edit', $mhs->nim) }}">Nilai</a>
        @csrf
        @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
{{ $mahasiswa-> links( )}}
@endsection
