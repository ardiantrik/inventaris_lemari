@extends('layouts/main')

@section('title', 'Data Inventaris')

@section('pageName')
    <h1>Halaman Manajemen Inventaris</h1>
@endsection

@section('breadCrumb')
    <!-- <li class="breadcrumb-item"><a href="/">Home</a></li> -->
    <li class="breadcrumb-item active">Manajemen Inventaris</li>
@endsection

@section('container')
<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-formtambah">
    <i class="fas fa-plus"></i>&nbsp;Tambah Data
</button>

@if (session('status')=='success_create')
    <div class="alert alert-success text-center">Data berhasil ditambahkan!</div>
@elseif(session('status')=='failed_create')
    <div class="alert alert-danger text-center">Data gagal ditambahkan!</div>
@endif

@if (session('status')=='success_delete')
    <div class="alert alert-success text-center">Data berhasil dihapus!</div>
@elseif(session('status')=='failed_delete')
    <div class="alert alert-danger text-center">Data gagal dihapus!</div>
@endif

@if (session('status')=='success_edit')
    <div class="alert alert-success text-center">Data berhasil diubah!</div>
@elseif(session('status')=='failed_edit')
    <div class="alert alert-danger text-center">Data gagal diubah!</div>
@endif

<hr>

<table id="alltable" class="table table-bordered table-striped text-center" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Golongan</th>
                <th>Kabupaten</th>
                <th>Tempat Tugas</th>
                <th>Kode Label</th>
                <th>Lemari</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $data)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $data->nip }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->golongan }}</td>
                <td>{{ $data->kabupaten }}</td>
                <td>{{ $data->tempat_tugas }}</td>
                <td>{{ $data->kode_label }}</td>
                <td>{{ $data->lemari }}</td>
                <td>
                    <a href="/data/{{ $data->inventaris_id }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>&nbsp;Edit</a>
                    <form action="/data/{{ $data->inventaris_id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</button>
                    </form>

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>


<div class="modal fade" id="modal-formtambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Form Tambah Data</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>


        <form method="post" action="/data" >
            @csrf
            <div class="modal-body">
                <div class="form-group row">
                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="Masukkan NIP" value="{{ old('nip') }}">
                        @error('nip')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="golongan" class="col-sm-2 col-form-label">Golongan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('golongan') is-invalid @enderror" id="golongan" name="golongan" placeholder="Masukkan Golongan" value="{{ old('golongan') }}">
                        @error('golongan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kabupaten" class="col-sm-2 col-form-label">Kabupaten</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten" placeholder="Masukkan Kabupaten" value="{{ old('kabupaten') }}">
                        @error('kabupaten')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_tugas" class="col-sm-2 col-form-label">Tempat Tugas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('tempat_tugas') is-invalid @enderror" id="tempat_tugas" name="tempat_tugas" placeholder="Masukkan Tempat Tugas" value="{{ old('tempat_tugas') }}">
                        @error('tempat_tugas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode_label" class="col-sm-2 col-form-label">Kode Label</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('kode_label') is-invalid @enderror" id="kode_label" name="kode_label" placeholder="Masukkan Kode Label" value="{{ old('kode_label') }}">
                        @error('kode_label')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lemari" class="col-sm-2 col-form-label">Lemari</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('lemari') is-invalid @enderror" id="lemari" name="lemari" placeholder="Masukkan No. Lemari" value="{{ old('lemari') }}">
                        @error('lemari')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection
