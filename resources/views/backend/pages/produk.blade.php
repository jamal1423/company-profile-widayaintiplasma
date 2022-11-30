@extends('backend.layout.main')

@section('content')
<h4 class="fw-bold">
  <span class="text-muted fw-light">Admin /</span> Produk
</h4>
<button type="button" class="btn btn-primary mb-4" id="btnAddProduk" data-bs-toggle="modal" data-bs-target="#produkTambah">
  <span class="tf-icons bx bx-plus-circle"></span>&nbsp; Tambah Produk
</button>

<div class="card">
  <h5 class="card-header">List Data Produk</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Artikel</th>
          <th>Jenis Produk</th>
          <th>Tipe Produk</th>
          <th>Foto</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse($dataProduk as $key=>$produk)
        <tr>
          <td><i class="fab fa-angular fa-lg text-danger"></i> {{ $dataProduk->firstItem()+$key }}</td>
          <td><i class="fab fa-angular fa-lg text-danger"></i>  {{ $produk->artikel }}</td>
          <td> {{ $produk->tipe_produk }} </td>
          <td> {{ $produk->jenis_produk }} </td>
          <td>
            <img src="{{ asset('gambar-produk/'.$produk->foto) }}" alt="Avatar" class="avatar pull-up">
          </td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#" id="produk-edit-{{ $produk->id }}" onClick="produkEdit(this)" data-id="{{ $produk->id }}"><i class="bx bx-edit-alt me-1 text-primary"></i> Edit</a>
                <a class="dropdown-item" href="#" id="produk-del-{{ $produk->id }}" onClick="produkDel(this)" data-id="{{ $produk->id }}"><i class="bx bx-trash me-1 text-danger"></i> Hapus</a>
              </div>
            </div>
          </td>
        </tr>
        @empty
          <tr>
            <td colspan="6">Data tidak ditemukan.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
    
    <div class="demo-inline-spacing">
      <nav aria-label="Page navigation">
        {{ $dataProduk->links('pagination::bootstrap-5') }}
      </nav>
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
      @if(Session::has('produk-tambah'))
        Produk berhasil ditambahkan.
      @endif
      
      @if(Session::has('produk-edit'))
        Produk berhasil diubah.
      @endif
      
      @if(Session::has('produk-delete'))
        Produk berhasil dihapus.
      @endif
    </div>
  </div>
</div>

<!-- Tambah Produk -->
<div class="modal fade" id="produkTambah" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Tambah Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/produk-tambah" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Nama Artikel</label>
              <input type="text" id="artikel" value="{{ old('artikel') }}" class="form-control @error('artikel') is-invalid @enderror" name="artikel" placeholder="Nama Artikel">
              @error('artikel')
                  <div id="defaultFormControlHelp" class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row g-2">
            <div class="col mb-3">
              <label for="emailBasic" class="form-label">Jenis Produk</label>
              <select class="form-select" id="jenis_produk" aria-label="Default select example" name="jenis_produk">
                <option selected="">Pilih Jenis Produk</option>
                <option value="Sepatu">Sepatu</option>
                <option value="Sandal">Sandal</option>
              </select>
            </div>
            <div class="col mb-3">
              <label for="dobBasic" class="form-label">Tipe Produk</label>
              <select class="form-select" id="tipe_produk" aria-label="Default select example" name="tipe_produk">
                <option selected="">Pilih Tipe Produk</option>
                <option value="Kid">Kid</option>
                <option value="Men">Men</option>
                <option value="Ladies">Ladies</option>
              </select>
            </div>
          </div>
          
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Foto Produk</label>
              <div class="input-group">
                <input type="file" value="{{ old('foto') }}" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto">
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

<!-- Edit Produk -->
<div class="modal fade" id="produkEditModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/produk-edit" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          @csrf
          @method('patch')
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Nama Artikel</label>
              <input type="hidden" id="id" name="id">
              <input type="hidden" name="oldImage" id="oldImage">
              <input type="text" id="artikelEdit" class="form-control" name="artikel" placeholder="Nama Artikel">
            </div>
          </div>

          <div class="row g-2">
            <div class="col mb-3">
              <label for="emailBasic" class="form-label">Jenis Produk</label>
              <select class="form-select" id="jenis_produkEdit" aria-label="Default select example" name="jenis_produk">
              </select>
            </div>
            <div class="col mb-3">
              <label for="dobBasic" class="form-label">Tipe Produk</label>
              <select class="form-select" id="tipe_produkEdit" aria-label="Default select example" name="tipe_produk">
              </select>
            </div>
          </div>
          
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Foto Produk</label>
              <div id="img" style="margin-bottom:10px;"></div>
              <div class="input-group">
                <input type="file" name="foto" class="form-control">
              </div>
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
<div class="modal fade" id="produkDeleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="text-align:center;">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/produk-delete" method="post">
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
          $("#btnAddProduk").trigger("click");
      });
    </script>
    @endif
@endpush