@extends('template.main')

@section('container')
<a href="/kategori/tambah" class="btn btn-info mb-3">Tambah Kategori</a>

<div class="col-lg-auto">
<div class="card mb-4">

    <div class="table-responsive">
        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Tombol Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $category)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$category->nama}}</td>
                    <td>
                      <a href="/kategori/{{$category->id}}" class="badge btn-info"><span data-feather="eye"></span></a>
                      @if (Auth::user()->role === 'admin')
                      <form action="/kategori/{{$category->id}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge btn-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                      </form>
                      @endif
                    </td>
                  </tr>
              @endforeach
    </tbody>
    </table>
</div>
</div>
</div>
@endsection