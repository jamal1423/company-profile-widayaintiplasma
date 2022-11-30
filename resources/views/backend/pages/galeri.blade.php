@extends('backend.layout.main')

@section('content')
<h4 class="fw-bold">
  <span class="text-muted fw-light">Admin /</span> Galeri
</h4>
<button type="button" class="btn btn-primary mb-4" id="btnGaleriTambah" data-bs-toggle="modal" data-bs-target="#galeriTambah">
  <span class="tf-icons bx bx-plus-circle"></span>&nbsp; Tambah Galeri
</button>

<div class="row mb-5">
  @forelse($dataGaleri as $key=>$galeri)
  <div class="col-md-6 col-lg-4 mb-3">
    <div class="card h-100">
      <img class="card-img-top" src="{{ asset('gambar-galeri/'.$galeri->foto) }}" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title"> {{ $galeri->judul }} </h5>
        <p class="card-text"> {{ $galeri->deskripsi }} </p>
        <div class="btn-group" role="group" aria-label="First group">
          <button type="button" class="btn btn-outline-secondary" id="galeri-edit-{{ $galeri->id }}" onClick="galeriEdit(this)" data-id="{{ $galeri->id }}"><i class="bx bxs-message-square-edit text-info"></i></i></button>
          <button type="button" class="btn btn-outline-secondary" id="galeri-delete-{{ $galeri->id }}" onClick="galeriDel(this)" data-id="{{ $galeri->id }}"><i class="bx bxs-message-square-x text-danger"></i></button>
        </div>
      </div>
    </div>
  </div>
  @empty
  <div class="col-md-12">
    <div class="row g-0">
      <div class="alert alert-secondary" role="alert">
        Data tidak ditemukan.
      </div>
    </div>
  </div>
  @endforelse
</div>

<div class="demo-inline-spacing">
  <nav aria-label="Page navigation">
    {{ $dataGaleri->links('pagination::bootstrap-5') }}
  </nav>
</div>

{{-- TOAST NOTIFIKASI --}}
<div style="display:none">
  <select id="selectTypeOpt" class="form-select color-dropdown">
    <option value="bg-success">Success</option>
  </select>
  <select class="form-select placement-dropdown" id="selectPlacement">
    <option value="top-0 end-0">Top right</option>
  </select>
  <button id="showToastPlacement" class="btn btn-primary d-block">Show Toast</button>
</div>

<div class="bs-toast toast toast-placement-ex m-2" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
  <div class="toast-header">
    <i class='bx bx-check me-2'></i>
    <div class="me-auto fw-semibold">Sukses</div>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    @if(Session::has('galeri-tambah'))
      Foto galeri berhasil ditambahkan.
    @endif
    
    @if(Session::has('galeri-edit'))
      Foto galeri berhasil diubah.
    @endif
    
    @if(Session::has('galeri-delete'))
      Foto galeri berhasil dihapus.
    @endif
  </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="galeriTambah" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Tambah Galeri</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/galeri-tambah" method="post" enctype="multipart/form-data">
      @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Judul</label>
              <input type="text" id="nameBasic" class="form-control @error('judul') is-invalid @enderror" placeholder="Judul" name="judul">
              @error('judul')
                  <div id="defaultFormControlHelp" class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Deskripsi</label>
              <textarea class="form-control @error('deskripsi') is-invalid @enderror" rows="3" name="deskripsi"></textarea>
              @error('deskripsi')
                  <div id="defaultFormControlHelp" class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Foto Galeri</label>
              <div class="input-group">
                <input type="file" class="form-control @error('foto') is-invalid @enderror" id="inputGroupFile01" name="foto">
              </div>
              @error('foto')
                  <div class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="galeriEdit" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit Galeri</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/galeri-edit" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Judul</label>
              <input type="hidden" id="idEdit" name="id">
              <input type="hidden" id="oldImage" name="oldImage">
              <input type="text" id="judulEdit" name="judul" value="{{ old('title') }}" class="form-control @error('title') is-invalid  @enderror" placeholder="Title">
              @error('title')
                  <div id="defaultFormControlHelp" class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Deskripsi</label>
              <textarea class="form-control" rows="3" id="deskripsiEdit" name="deskripsi"></textarea>
              @error('deskripsi')
                <div id="defaultFormControlHelp" class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Foto Galeri</label>
              <div id="img"></div>
              <div class="input-group mt-2">
                <input type="file" class="form-control" id="inputGroupFile01" name="foto">
              </div>
              @error('foto')
                <div id="defaultFormControlHelp" class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete Galeri -->
<div class="modal fade" id="galeriDeleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="text-align:center;">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/galeri-delete" method="post">
        <div class="modal-body">
          @csrf
          @method('delete')
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic">Yakin akan hapus data <strong id="label-del"></strong>?</label>
              <div id="img-del" style="margin-top:20px;"></div>
              <input type="hidden" id="id-del" name="id_del">
              <input type="hidden" name="oldImage_del" id="oldImage-del">
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <button type="button" class="btn btn-outline-secondary mt-2" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-danger mt-2">Hapus</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
    @if (count($errors) > 0)
    <script type="text/javascript">
      $(document).ready(function(){
          $("#btnGaleriTambah").trigger("click");
      });
    </script>
    @endif
@endpush
