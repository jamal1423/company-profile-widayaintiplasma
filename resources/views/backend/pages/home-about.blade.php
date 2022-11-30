@extends('backend.layout.main')

@section('content')
<h4 class="fw-bold">
  <span class="text-muted fw-light">Admin /</span> Foto Home About
</h4>
<button type="button" class="btn btn-primary mb-4" id="btnHomeAboutFotoTambah" data-bs-toggle="modal" data-bs-target="#galeriTambah">
  <span class="tf-icons bx bx-plus-circle"></span>&nbsp; Tambah Foto About
</button>

<div class="row mb-5">
  @forelse($dataFotoHomeAbout as $homeAbout)
  <div class="col-md-6 col-lg-4 mb-3">
    <div class="card h-100">
      <img class="card-img-top" src="{{ asset('gambar-home-about/'.$homeAbout->foto) }}" alt="Card image cap">
      <div class="card-body">
        <div class="btn-group" role="group" aria-label="First group">
          <button type="button" class="btn btn-outline-secondary" id="homeAboutFoto-edit-{{ $homeAbout->id }}" onClick="homeAboutFotoEdit(this)" data-id="{{ $homeAbout->id }}"><i class="bx bxs-message-square-edit text-info"></i></i></button>
          <button type="button" class="btn btn-outline-secondary" id="homeAboutFoto-delete-{{ $homeAbout->id }}" onClick="homeAboutFotoDel(this)" data-id="{{ $homeAbout->id }}"><i class="bx bxs-message-square-x text-danger"></i></button>
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
  {{ $dataFotoHomeAbout->links('pagination::bootstrap-5') }}
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
    @if(Session::has('about-home-tambah'))
      Foto about berhasil ditambahkan.
    @endif
    
    @if(Session::has('about-home-edit'))
      Foto about berhasil diubah.
    @endif
    
    @if(Session::has('about-home-delete'))
      Foto about berhasil dihapus.
    @endif
    
    @if(Session::has('about-home-error'))
      Error. Silahkan ulangi proses.
    @endif
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="galeriTambah" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Tambah Foto About</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/setting-foto-about-tambah" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Deskripsi</label>
              <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi" name="deskripsi">
              @error('deskripsi')
                  <div id="defaultFormControlHelp" class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Foto Home About</label>
              <div class="input-group">
                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
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
<div class="modal fade" id="homeAboutEdit" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit Foto Home About</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/setting-foto-about-edit" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Deskripsi</label>
              <input type="hidden" id="idEdit" name="id">
              <input type="hidden" id="oldImage" name="oldImage">
              <input type="text" id="deskripsiEdit" name="deskripsi" value="{{ old('deskripsi') }}" class="form-control @error('deskripsi') is-invalid  @enderror" placeholder="Title">
              @error('deskripsi')
                  <div id="defaultFormControlHelp" class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Foto Home About</label>
              <div id="img"></div>
              <div class="input-group mt-2">
                <input type="file" class="form-control" name="foto">
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

<!-- Delete Home About Foto -->
<div class="modal fade" id="homeAboutFotoDel" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="text-align:center;">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/setting-foto-about-delete" method="post">
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
          $("#btnHomeAboutFotoTambah").trigger("click");
      });
    </script>
    @endif
@endpush

