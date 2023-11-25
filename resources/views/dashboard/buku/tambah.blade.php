@extends('template.main')

@section('container')
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Buku</h6>
    </div>
    <div class="card-body">
        <form action="/buku" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="Judul"class="text-primary font-weight-bold"> Judul Buku</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
            </div>

            @error('judul')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mb-3">
                <label for="kode_buku"class="text-primary font-weight-bold"> Kode Buku</label>
                <input type="text" name="kode_buku" class="form-control" value="{{ old('kode_buku') }}">
            </div>

            @error('kode_buku')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mb-3">
                <label for="kategori" class="text-primary font-weight-bold">Kategori</label>
                <select class="form-control" name="kategori_buku">
                    @foreach ($kategori as $category)
              @if (old('category_id') == $category->id)
              <option value="{{$category->id}}" selected>{{$category->nama}}</option>                
              @else
              <option value="{{$category->id}}">{{$category->nama}}</option>                
              @endif
            @endforeach
                </select>
            </div>

            @error('kategori_buku')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mb-3">
                <label for="pengarang" class="text-primary font-weight-bold">Pengarang</label>
                <input type="text" name="pengarang" class="form-control" value="{{ old('pengarang') }}">
            </div>

            @error('pengarang')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mb-3">
                <label for="penerbit" class="text-primary font-weight-bold">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" value="{{ old('penerbit') }}">
            </div>

            @error('penerbit')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group mb-3">
                <label for="tahun_terbit"class="text-primary font-weight-bold">Tahun Terbit</label>
                <input type="text" name="tahun_terbit" value="{{ old('tahun_terbit') }}"class="form-control">
            </div>

            @error('tahun_terbit')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="gambar" class="text-primary font-weight-bold">Tambah Sampul Buku</label>
                <div class="custom-file">
                    <input type="file" name="gambar" id="gambar" value="{{ old('gambar') }}" onchange="previewImage()">
                </div>
            </div>
            @error('gambar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="d-flex justify-content-end">
                <a href="/buku" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary mx-1 px-4">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>
  
    function previewImage() {
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');
  
      imgPreview.style.display = 'block';
  
      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);
  
      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>

<script>
    $('#multiselect').select2({
        allowClear: true
    });
</script>
@endsection