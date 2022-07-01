@extends('mahasiswa.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
            Edit Mahasiswa
        </div>
        <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
         <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
             @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('mahasiswa.update',$Mahasiswa->nim) }}" id="myForm">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="Nim">Nim</label>
            <input type="text" name="Nim" class="form-control" id="Nim" aria-describedby="Nim" value="{{ $Mahasiswa->nim }}">
        </div>
        <div class="form-group">
            <label for="Nama">Nama</label>
            <input type="Nama" name="Nama" class="form-control" id="Nama" ariadescribedby="Nama" value="{{ $Mahasiswa->nama }}">
        </div>
        <div class="form-group">
        <label for="Kelas">Kelas</label>
        <select class="form-control" name="Kelas" id="Kelas">
            @foreach($kelas as $kls)
                <option value="{{ $kls->id }}" {{ $Mahasiswa->kelas_id == $kls->id ? 'selected' : '' }}>{{ $kls->nama_kelas }}</option>
            @endforeach
        </select>
    </div>
        <div class="form-group">
            <label for="Jurusan">Jurusan</label>
            <input type="Jurusan" name="Jurusan" class="form-control" id="Jurusan" ariadescribedby="Jurusan" value="{{ $Mahasiswa->jurusan }}">
        </div>
        <div class="form-group">
        <label for="Email">Email</label>
        <input type="Email" name="Email" class="form-control" id="Email" ariadescribedby="Email" value="{{ $Mahasiswa->email }}">
        </div>
        <div class="form-group">
            <label for="Alamat">Alamat</label>
            <input type="Alamat" name="Alamat" class="form-control" id="Alamat" ariadescribedby="Alamat" value="{{ $Mahasiswa->alamat }}">
                </div>
        <div class="form-group">
            <label for="tl">Tanggal Lahir</label>
            <input type="tl" name="tl" class="form-control" id="tl" ariadescribedby="tl" value="{{ $Mahasiswa->tl }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
       </div>
      </div>
    </div>
@endsection
