@extends('template.main')

@section('container')
<div class="card">

    <div class="card-body">

        <form action="/pinjam/balikan" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama" class="text-primary font-weight-bold">Nama Peminjam</label>
                @if (Auth::user()->role === 'admin')
                <select name="users_id" id="" class="form-control">
                    <option value=""></option>
                    @forelse ($user as $item)
                            <option value="{{ $item->id }}">{{ $item->nama}}</option>
                        @empty
                            tidak ada user
                        @endforelse
                </select>
                @endif
                @if(Auth::user()->role === 'user')
                <select name="users_id" id="" class="form-control">
                    <option value="{{ Auth()->user()->id }}">{{ Auth()->user()->nama }}</option>
                </select>
                @endif
                @error('users_id')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
                <div class="fom-group">
                <label for="buku" class="text-primary font-weight-bold mt-3">Buku yang akan dipinjam</label>
                <select name="buku_id" id="" class="form-control">
                    @forelse ($buku as $s)
                    <option value="{{ $s->id }}">{{ $s->judul}} ( {{ $s->kode_buku }} ) - {{ $s->status }}</option>
                @empty
                    tidak ada buku yang tersedia
                @endforelse
                </select>
            </div>

            @error('buku_id')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror

            <div class="d-flex justify-content-end mt-5">
                <a href="/pinjam" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary mx-1 px-4">Submit</button>
            </div>


        </form>

    </div>
</div>
@endsection