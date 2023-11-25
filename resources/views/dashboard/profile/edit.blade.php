@extends('template.main')
@section('container')
<form action="/profile/{{$user->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <div class="card pb-5">
        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold mt-2">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $user->nama) }}">
        </div>

        @error('nama')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="npm" class="text-md text-primary font-weight-bold">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}">
        </div>

        @error('email')
            <div class="alert-danger"> {{ $message }}</div>
        @enderror

        <div class="form-group mx-4 my-2">
            <label for="nama" class="text-md text-primary font-weight-bold">Jurusan</label>
            <input type="text" name="jurusan"class="form-control" value="{{ old('jurusan', $user->jurusan) }}">
        </div>

        @error('jurusan')
            <div class="alert-danger mx-2"> {{ $message }}</div>
        @enderror

        <div class="button-save d-flex justify-content-end">
            <a href="/profile" class="btn btn-danger mt-4 py-1 px-4">Batal</a>
            <button type="submit"class="btn btn-primary mt-4 mx-2 px-5 py-1">Simpan</button>
</form>
</div>
</div>
@endsection