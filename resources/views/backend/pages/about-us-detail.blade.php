@extends('backend.layout.main')

@section('content')
<h4 class="fw-bold">
  <span class="text-muted fw-light">Admin /</span> About Us
</h4>
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Form Edit About Us</h5>
      </div>
      <div class="card-body">
        <form action="/dashboard/setting-about-us-edit" method="post" enctype="multipart/form-data">
          @csrf
          @method('patch')

          <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="bahasa" value="{{ $getBahasa }}" checked>
            <label class="form-check-label" for="defaultRadio1">
              @if($getBahasa == "id")
              Indonesia
              @else
              English
              @endif
            </label>
          </div>

          <div class="mb-3">
            <label for="nameBasic" class="form-label">Deskripsi</label>
            <input type="hidden" name="id" value="{{ $aboutUs->id }}">
            <input type="hidden" name="oldImage" value="{{ $aboutUs->foto }}">
            <input id="deskripsiEdit" type="hidden" name="deskripsi" value="{{ old('deskripsi',$aboutUs->deskripsi) }}">
            <trix-editor input="deskripsiEdit"></trix-editor>
            @error('deskripsi')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="nameBasic" class="form-label">Visi</label>
            <input id="visiEdit" type="hidden" name="visi" value="{{ old('visi',$aboutUs->visi) }}">
            <trix-editor input="visiEdit"></trix-editor>
            @error('visi')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="nameBasic" class="form-label">Misi</label>
            <input id="misiEdit" type="hidden" name="misi" value="{{ old('misi',$aboutUs->misi) }}">
            <trix-editor input="misiEdit"></trix-editor>
            @error('misi')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="nameBasic" class="form-label">Foto About</label>
            <div>
              <img src="{{ asset('gambar-about-us/'. $aboutUs->foto) }}" class="img-thumbnail img-fluid">
            </div>
            <div class="input-group mt-2">
              <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
            </div>
            @error('foto')
              <div class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>
          <a href="/dashboard/setting-about-us"><button type="button" class="btn btn-secondary"><i class="bx bx-arrow-back"></i> Kembali</button></a>
          <button type="submit" class="btn btn-primary"> <i class="bx bx-upload"></i> Update</button>
        </form>
      </div>
    </div>
  </div>
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
    
    @if(Session::has('about-us-edit'))
      Blog berhasil diubah.
    @endif
    
  </div>
</div>
@endsection