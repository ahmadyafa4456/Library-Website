@extends('template.main')

@section('container')
@if (Auth()->user()->role === 'admin')
<a href="/buku/tambah" class="btn btn-info mb-3">Tambah Buku</a>
@endif
<div class="card container-fluid mb-3 row">

    <div class="row d-flex flex-wrap justify-content-center">

        @forelse ($buku as $item)
            <div class="col-3 my-2" >
                <div class="card mx-2 my-2" style="width:250px">
                        <img class="card-img-top" style="height:200px;" src="{{ asset('storage/' . $item->gambar) }}">
                    <div class="card-body d-flex flex-column justify-content-between" style="height:250px">
                        <div class="detai-buku">
                            <h5 class="card-title text-primary"><a
                                    href="/buku/{{ $item->id }}"style="text-decoration: none; font-size:1rem;font-weight:bold;">
                                    {{ $item->judul }}</a></h5>
                            <p class="card-text m-0">Pengarang : <a href="#"
                                    style="text-decoration: none;">{{ $item->pengarang }}</a></p>
                            <p class="card-text m-0">Kategori : </p>
                            <p class="text-primary">
                                @foreach ($item->category_buku as $kategori )
                                {{ $kategori->nama }},
                                @endforeach
                        </p>
                            <p class="card-text m-0">Status : {{$item->status  }}</p>
                        </div>
                        @if (Auth::user()->role === 'admin')
                            <div class="button-area">
                                <button class="btn-sm btn-warning px-2"><a href="/buku/{{ $item->id }}/edit"
                                        style="text-decoration: none;color:white">Edit</a></button>
                                <button class="btn-sm btn-danger px-3"><a data-toggle="modal"
                                        data-target="#DeleteModal{{ $item->id }}">Delete</a></button>
                            </div>
                        @endif

                        @if (Auth::user()->role === 'user')
                            <div class="button-area">
                                @if ($item->status === 'In Stock')
                                <button class="btn-sm btn-danger px-4"><a a href="/pinjam/create"
                                    style="text-decoration: none; color:white;">Pinjam Buku</a></button>
                                @endif
                            </div>
                        @endif

                        <div class="modal fade" id="DeleteModal{{ $item->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="ModalLabelDelete" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabelDelete">Ohh No!</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-primary"
                                            data-dismiss="modal">Cancel</button>
                                        <form action="/buku/{{ $item->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger px-4" type="submit"
                                                value="delete">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <h1 class="text-primary mt-3">Tidak ada buku</h1>
        @endforelse

    </div>
</div>
@if (session()->has('updatebuku'))
      <script>
         Swal.fire(
  'Buku Diupdate',
  '',
  'success'
)
      </script>
      @endif
@endsection