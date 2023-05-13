@extends('layouts.base')

@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $s )
                    <tr>
                        <td> {{ $s->id }}</td>
                        <td> {{ $s->nama_siswa }}</td>
                        <td > {{ $s->kelas->kelas }}</td>
                        <td> {{ $s->jurusan->jurusan }}</td>
                        <td  class="d-flex justify-content-center" >
                            <a href="{{ route('siswa.edit', $s->id) }}"
                                class="btn btn-sm btn-success align-center mr-3 "><i class="fas fa-edit mr-1 "></i>Edit</a>
                                <form id="delete-form{{ $s->id }}"
                                    action="{{ route('siswa.destroy', $s->id) }}" class="d-inline"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                   <button class="btn-sm btn-danger border-0" onclick="return confirm ('Are you sure?')">
                                    <i class="fas fa-trash-alt mr-1"></i>Delete </button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Tambah</span>
            </a>
        </div>
    </div>
</div>

@endsection
