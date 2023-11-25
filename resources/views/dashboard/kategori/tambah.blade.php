@extends('template.main')

@section('container')
<div class="card px-4 pt-3 pb-5">

    <form action="/kategori" method="post">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Nama Kategori</label>
            <input name="nama" type="text" class="form-control" id="nama">
        </div>
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <a href="/kategori" class="btn btn-danger">Batal</a>
        <button class="btn btn-info">Tambah</button>

    </form>
</div>
@endsection