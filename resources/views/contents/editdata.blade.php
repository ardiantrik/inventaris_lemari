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
<!-- Horizontal Form -->
<div class="card card-info">
    <div class="card-header">
    <h3 class="card-title">Form Edit Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post" action="/data/{{ $data->inventaris_id }}" >
        @method('put')
        @csrf
        <div class="modal-body">
            <div class="form-group row">
                <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="Masukkan NIP" value="{{ $data->nip }}">
                    @error('nip')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ $data->nama }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="golongan" class="col-sm-2 col-form-label">Golongan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('golongan') is-invalid @enderror" id="golongan" name="golongan" placeholder="Masukkan Golongan" value="{{ $data->golongan }}">
                    @error('golongan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="kabupaten" class="col-sm-2 col-form-label">Kabupaten</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" id="kabupaten" name="kabupaten" placeholder="Masukkan Kabupaten" value="{{ $data->kabupaten }}">
                    @error('kabupaten')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="tempat_tugas" class="col-sm-2 col-form-label">Tempat Tugas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('tempat_tugas') is-invalid @enderror" id="tempat_tugas" name="tempat_tugas" placeholder="Masukkan Tempat Tugas" value="{{ $data->tempat_tugas }}">
                    @error('tempat_tugas')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="kode_label" class="col-sm-2 col-form-label">Kode Label</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('kode_label') is-invalid @enderror" id="kode_label" name="kode_label" placeholder="Masukkan Kode Label" value="{{$data->kode_label }}">
                    @error('kode_label')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="lemari" class="col-sm-2 col-form-label">Lemari</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('Lemari') is-invalid @enderror" id="lemari" name="lemari" placeholder="Masukkan No. Lemari" value="{{ $data->lemari }}">
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
<!-- /.card -->

@endsection
