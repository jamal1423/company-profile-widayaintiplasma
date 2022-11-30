@extends('backend.layout.main')

@section('content')
<h4 class="fw-bold">
  <span class="text-muted fw-light">Admin /</span> Loker
</h4>
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" id="btnKarirTambah" data-bs-target="#karirTambah">
  <span class="tf-icons bx bx-plus-circle"></span>&nbsp; Tambah Loker
</button>

<div class="row mb-5">
  @forelse($dataKarir as $key=>$karir)
    <div class="col-md-6">
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-12">
            <div class="card-body">
              <h5 class="card-title">{{ $karir->title }}</h5>
              <p class="card-text">
                {{ Str::words(strip_tags($karir->deskripsi), 6, ' [...]') }}
                
              </p>
              
              <div class="btn-group" role="group" aria-label="First group">
                <button type="button" class="btn btn-outline-secondary"><a href="/dashboard/karir/detail/{{ base64_encode( $karir->id ) }}"><i class="bx bxs-message-square-edit text-info"></i></a></button>
                <button type="button" class="btn btn-outline-secondary" id="karir-delete-{{ $karir->id }}" onClick="karirDel(this)" data-id="{{ $karir->id }}"><i class="bx bxs-message-square-x text-danger"></i></button>
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
    {{ $dataKarir->links('pagination::bootstrap-5') }}
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
    @if(Session::has('karir-error'))
    <i class='bx bx-error-alt me-2'></i>
    <div class="me-auto fw-semibold"> Error</div>
    @else
    <i class='bx bx-check me-2'></i>
    <div class="me-auto fw-semibold">Sukses</div>
    @endif
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    @if(Session::has('karir-tambah'))
      Data loker berhasil ditambahkan.
    @endif
    
    @if(Session::has('karir-delete'))
      Data loker berhasil dihapus.
    @endif
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="karirTambah" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Tambah Loker</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/karir-tambah" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Judul</label>
              <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid  @enderror" placeholder="Title">
              @error('title')
                  <div class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Deskripsi</label>
              <input id="x" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
              <trix-editor input="x"></trix-editor>
              @error('deskripsi')
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

<!-- Delete Blog -->
<div class="modal fade" id="karirDeleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="text-align:center;">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/karir-delete" method="post">
        <div class="modal-body">
          @csrf
          @method('delete')
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic">Yakin akan hapus data <strong id="label-del"></strong>?</label>
              <input type="hidden" id="id-del" name="id_del">
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
          $("#btnKarirTambah").trigger("click");
      });
    </script>
    @endif
@endpush
