@extends('template.main')

@section('container')
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
        </div>
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Anggota</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tombol Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($user as $key => $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td>

                                @if (Auth::user()->role === 'admin')
                                    <button class="btn btn-info"><a href="/anggota/{{ $item->id }}"
                                            style="text-decoration: none; color:white;"><span data-feather="info"></span></a></button>
                                    <button class="btn btn-warning"><a href="/anggota/{{ $item->id }}/edit"
                                            style="text-decoration: none;color:white"><span data-feather="edit"></span></a></button>
                                    <button class="btn btn-danger"><a data-toggle="modal"
                                            data-target="#DeleteModal{{ $item->id }}"><span data-feather="x-circle"></span></a></button>

                                    <!--Delete Modal -->
                                    <div class="modal fade" id="DeleteModal{{ $item->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="ModalLabelDelete" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabelDelete">Ohh No!</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete?</p>
                                                </div>
                                                <div class="modal-footer">
                                                        <form action="/anggota/{{$item->id}}/delete" method="post" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="badge btn-danger border-0"><span data-feather="x-circle"></span></button>
                                                          </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        </div>
        @endif

        @if (Auth::user()->role === 'user')
            <a href="/kategori/{{ $item->id }}" class="btn-sm btn-info px-3 py-2">Detail</a>
        @endif

        </form>
        </td>
        </tr>
    @empty
        @endforelse
        </tbody>
        </table>
    </div>
</div>
</div>
@endsection