@extends('layouts.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Tambah Siswa</h5>
    </div>
    <div class="card-body">
        <form class="user" action="{{ route('siswa.update',$siswa) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group" >
                <h6>Nama Siswa</h6>
                <input type="Text" class="form-control bg-light border-1 small" name="nama_siswa"
                    id="exampleInputname" aria-describedby="emailHelp"
                    placeholder="Ketikkan Nama Siswa" value="{{ $siswa->nama_siswa }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control" id="exampleFormControlSelect1" name="kelas">
                    @foreach ($kelas as $k )
                  <option value="{{ $k->id }}" {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>{{ $k->kelas }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Jurusan</label>
                <select class="form-control" id="exampleFormControlSelect1" name="jurusan">
                    @foreach ($jurusan as $j )
                  <option value="{{ $j->id }}" {{ $siswa->kelas_id == $j->id ? 'selected' : '' }}>{{ $j->jurusan }}</option>
                  @endforeach
                </select>
              </div>
            <button class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Simpan</span>

            </button>

            <hr>
        </form>
    </div>
</div>
@endsection
