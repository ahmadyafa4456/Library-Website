@extends('template.main')

@section('container')
<div class="card">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Profile</h4>
    </div>
    <div class="row">
        <div class="col-auto ml-5 mr-5 my-4">
            @if ($user->photo != null)
                <img src="{{ asset('/img/undraw_profile.svg' . $user->photo) }}"
                    style="width:150px;height:150px;border-radius:100px">
            @else
                <img src="{{ asset('/img/user.jpg') }}" style="width:100px;height:100px;border-radius:50px">
            @endif
        </div>
        <div class="col-auto mx-4 mt-4">
            <div class="form-group mb-3">
                <label for="nama" class="text-lg text-primary font-weight-bold">Nama</label>
                <h4>{{ $user->nama }}</h4>
            </div>

            <div class="form-group mb-3">
                <label for="npm" class="text-lg text-primary font-weight-bold">Email</label>
                <h4>{{ $user->email }}</h4>
            </div>

            <div class="form-group mb-3">
                <label for="prodi" class="text-lg text-primary font-weight-bold">Jurusan</label>
                <h4>{{ $user->jurusan }}</h4>
            </div>

            <div class="form-group mb-3">
                <label for="prodi" class="text-lg text-primary font-weight-bold">Status</label>
                <h4>{{ $user->role }}</h4>
            </div>
        </div>
    </div>
    <div class="edit d-flex justify-content-end my-4 mx-4">
        <a href="/anggota" class="btn btn-primary px-5">Kembali</a>
    </div>
</div>
@endsection