@extends('backend.layout.main')

@section('content')
<h4 class="fw-bold">
  <span class="text-muted fw-light">Admin /</span> Url Sosmed
</h4>
<button type="button" class="btn btn-primary mb-4" id="modalPost" data-bs-toggle="modal" data-bs-target="#urlTambah">
  <span class="tf-icons bx bx-plus-circle"></span>&nbsp; Tambah Url Sosmed
</button>

<div class="card">
  <h5 class="card-header">List Data Url</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Sosmed</th>
          <th>Link</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($dataUrl as $key=>$url)
        <tr>
          <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>{{ $dataUrl->firstItem()+$key }}</strong></td>
          <td><i class="fab fa-angular fa-lg text-danger"></i> <strong>{{ $url->nama_sosmed }}</strong></td>
          <td>{{ $url->url }}</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#" id="url-edit-{{ $url->id }}" onClick="urlEdit(this)" data-id="{{ $url->id }}"><i class="bx bx-edit-alt me-1 text-primary"></i> Edit</a>
                <a class="dropdown-item" href="#" id="url-del-{{ $url->id }}" onClick="urlDel(this)" data-id="{{ $url->id }}"><i class="bx bx-trash me-1 text-danger"></i> Hapus</a>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
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
    @if(Session::has('url-tambah'))
      Url berhasil ditambahkan.
    @endif
    
    @if(Session::has('url-edit'))
      Url berhasil diubah.
    @endif
    
    @if(Session::has('url-delete'))
      Url berhasil dihapus.
    @endif
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="urlTambah" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Tambah Url</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/setting-url-sosmed-tambah" method="post">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Nama Sosmed</label>
              <input type="text" class="form-control @error('nama_sosmed') is-invalid @enderror" placeholder="Nama Artikel" name="nama_sosmed" value="{{ old('nama_sosmed') }}">
              @error('nama_sosmed')
                <div class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Url</label>
              <input type="text" class="form-control @error('url') is-invalid @enderror" placeholder="Url" name="url" value="{{ old('url') }}">
              @error('url')
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

<!-- Modal -->
<div class="modal fade" id="modalUrlEdit" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Tambah Url</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/setting-url-sosmed-edit" method="post">
        @csrf
        @method('patch')
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Nama Sosmed</label>
              <input type="hidden" name="id" id="id">
              <input type="text" id="namaEdit" class="form-control @error('nama_sosmed') is-invalid @enderror" placeholder="Nama Artikel" name="nama_sosmed" value="{{ old('nama_sosmed') }}">
              @error('nama_sosmed')
                <div class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Url</label>
              <input type="text" id="urlEdit" class="form-control @error('url') is-invalid @enderror" placeholder="Url" name="url" value="{{ old('url') }}">
              @error('url')
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

<!-- Delete Produk -->
<div class="modal fade" id="modelUrlDelete" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="text-align:center;">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/setting-url-sosmed-delete" method="post">
        <div class="modal-body">
          @csrf
          @method('delete')
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic">Yakin akan hapus data <strong id="label-del"></strong>?</label>
              <input type="hidden" id="id-del" name="id_del">
              <input type="hidden" name="nama-del" id="namaDel">
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
          $("#modalPost").trigger("click");
      });
    </script>
    @endif
@endpush
