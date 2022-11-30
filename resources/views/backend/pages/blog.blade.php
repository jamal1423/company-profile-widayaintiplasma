@extends('backend.layout.main')

@section('content')
<h4 class="fw-bold">
  <span class="text-muted fw-light">Admin /</span> Blog
</h4>
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" id="btnBlogTambah" data-bs-target="#blogsTambah">
  <span class="tf-icons bx bx-plus-circle"></span>&nbsp; Tambah Blog
</button>

<div class="row mb-5">
  @forelse($dataBlog as $key=>$blog)
    <div class="col-md-6">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img class="card-img card-img-left" style="height: -webkit-fill-available;" src="{{ asset('gambar-blog/'.$blog->foto) }}" alt="Card image">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{ $blog->title }}</h5>
              <p class="card-text">
                {{ Str::words(strip_tags($blog->deskripsi), 6, ' [...]') }}
              </p>
              <p class="card-text"><small class="text-muted">{{ date('d-m-Y H:i:s', strtotime($blog->tglBerita)) }}</small></p>
              
              <div class="btn-group" role="group" aria-label="First group">
                <button type="button" class="btn btn-outline-secondary" id="blog-edit-{{ $blog->id }}" onClick="blogPreview(this)" data-id="{{ $blog->id }}"><i class="bx bx-show text-success"></i></button>
                <button type="button" class="btn btn-outline-secondary"><a href="/dashboard/blog/detail/{{ base64_encode( $blog->id ) }}"><i class="bx bxs-message-square-edit text-info"></i></a></button>
                <button type="button" class="btn btn-outline-secondary" id="blog-delete-{{ $blog->id }}" onClick="blogDel(this)" data-id="{{ $blog->id }}"><i class="bx bxs-message-square-x text-danger"></i></button>
              </div>
            </div>
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
    {{ $dataBlog->links('pagination::bootstrap-5') }}
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
    @if(Session::has('blog-tambah'))
      Blog berhasil ditambahkan.
    @endif
    
    @if(Session::has('blog-delete'))
      Blog berhasil dihapus.
    @endif
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="blogsTambah" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Tambah Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/blog-tambah" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Judul</label>
              <input type="text" id="nameBasic" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid  @enderror" placeholder="Title">
              @error('title')
                  <div id="defaultFormControlHelp" class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Deskripsi</label>
              <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="deskripsi">{{ old('deskripsi') }}</textarea> -->
              <input id="x" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
              <trix-editor input="x"></trix-editor>
              @error('deskripsi')
                <div id="defaultFormControlHelp" class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Foto Blog</label>
              <div class="input-group">
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

<div class="modal fade" id="blogPreview" tabindex="-1" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-fullscreen" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="titlePreview">Modal title</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-header">
        <h6 class="modal-title text-muted" id="tglPreview">Tgl. Blog</h6>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 col-lg-12 mb-4" style="position: absolute; left: 0%; top: 0px;">
          <div class="card">
            <div class="card-body">
              <div id="imgPrev" class="col-sm-12 col-lg-12 mb-4"></div>
              <p id="deskripsiPreview"></p>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Blog -->
<div class="modal fade" id="blogDeleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="text-align:center;">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/blog-delete" method="post">
        <div class="modal-body">
          @csrf
          @method('delete')
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic">Yakin akan hapus data <strong id="label-del"></strong>?</label>
              <div id="img-del" style="margin-top:20px;"></div>
              <input type="hidden" id="id-del" name="id_del">
              <input type="hidden" name="oldImage_del" id="oldImage-del">
              <!-- <button type="button" class="btn btn-outline-secondary mt-2" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-danger mt-2">Hapus</button> -->
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
          $("#btnBlogTambah").trigger("click");
      });
    </script>
    @endif
@endpush
