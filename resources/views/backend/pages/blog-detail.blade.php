@extends('backend.layout.main')

@section('content')
<h4 class="fw-bold">
  <span class="text-muted fw-light">Admin /</span> Blog Detail
</h4>
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Form Edit Blog</h5>
      </div>
      <div class="card-body">
        <form action="/dashboard/blog-edit" method="post" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <div class="mb-3">
            <label for="nameBasic" class="form-label">Judul</label>
              <input type="hidden" id="idDel" name="id" value="{{ $blogs->id }}">
              <input type="hidden" id="oldTitle" name="oldTitle" value="{{ $blogs->title }}">
              <input type="hidden" id="oldImage" name="oldImage" value="{{ $blogs->foto }}">
              <input type="text" id="titleEdit" name="title" value="{{ old('title',$blogs->title) }}" class="form-control @error('title') is-invalid  @enderror" placeholder="Title">
              @error('title')
                  <div id="defaultFormControlHelp" class="form-text text-danger">{{ $message }}</div>
              @enderror
          </div>
          <div class="mb-3">
          <label for="nameBasic" class="form-label">Deskripsi</label>
              <input id="deskripsiEdit" type="hidden" name="deskripsi" value="{{ old('deskripsi',$blogs->deskripsi) }}">
              <trix-editor input="deskripsiEdit"></trix-editor>
              @error('deskripsi')
                <div id="defaultFormControlHelp" class="form-text text-danger">{{ $message }}</div>
              @enderror
          </div>
          <div class="mb-3">
            <label for="nameBasic" class="form-label">Foto Blog</label>
            <div>
              <img src="{{ asset('gambar-blog/'. $blogs->foto) }}" class="img-thumbnail img-fluid">
            </div>
            <div class="input-group mt-2">
              <input type="file" class="form-control" id="inputGroupFile01" name="foto">
            </div>
            @error('foto')
              <div id="defaultFormControlHelp" class="form-text text-danger">{{ $message }}</div>
            @enderror
          </div>
          <a href="/dashboard/blog"><button type="button" class="btn btn-secondary"><i class="bx bx-arrow-back"></i> Kembali</button></a>
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
    
    @if(Session::has('blog-edit'))
      Blog berhasil diubah.
    @endif
    
  </div>
</div>
@endsection