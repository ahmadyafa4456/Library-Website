@extends('template.main')

@section('container')
@if (Auth::user()->role === 'admin')
<div class="container">
    <a href="/pinjam/create" class="btn btn-info mb-3 ">Pinjam Buku</a>
    <a href="/pinjam/balik" class="btn btn-info mb-3 ">Kembalikan Buku</a>
    <a href="/cetaklaporan" class="btn btn-info mb-3 mx-2">Cetak</a>
</div>
<div class="col-lg-auto">
    <div class="card mb-4">
        <div class="table-responsive p-3">
            <table class="table align-items-center justify-content-center table-flush table-hover" id="dataTableHover" style="font-size: .7rem">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Kode Buku</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Wajib Pengembalian</th>
                        <th scope="col">Tanggal Pengembalian</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pinjamanUser as $item )
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->user->nama }}</td>
                        <td>{{ $item->buku->judul }}</td>
                        <td>{{ $item->buku->kode_buku }}</td>
                        <td>{{ $item->tanggal_pinjam }}</td>
                        <td>{{ $item->tanggal_wajib_kembali }}</td>
                        <td>{{ $item->tanggal_pengembalian }}</td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@if(Auth::user()->role === 'user')
<div class="container">
    <a href="/pinjam/create" class="btn btn-info mb-3 ">Pinjam Buku</a>
    <a href="/pinjam/balik" class="btn btn-info mb-3 ">Kembalikan Buku</a>
</div>
<div class="col-lg-auto">
    <div class="card mb-4">
        <div class="table-responsive p-3">
            <table class="table align-items-center justify-content-center table-flush table-hover" id="dataTableHover" style="font-size: .7rem">
                <thead class="thead-light">
                    <tr class="">
                        <th scope="col">No.</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Kode Buku</th>
                        <th scope="col">Tanggal Pinjam</th>
                        <th scope="col">Tanggal Wajib Pengembalian</th>
                        <th scope="col">Tanggal Pengembalian</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pinjamanUser as $item )
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $item->user->nama }}</td>
                        <td>{{ $item->buku->judul }}</td>
                        <td>{{ $item->buku->kode_buku }}</td>
                        <td>{{ $item->tanggal_pinjam }}</td>
                        <td>{{ $item->tanggal_wajib_kembali }}</td>
                        <td>{{ $item->tanggal_pengembalian }}</td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@endsection