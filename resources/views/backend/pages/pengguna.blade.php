@extends('backend.layout.main')

@section('content')
<h4 class="fw-bold">
  <span class="text-muted fw-light">Admin /</span> Pengguna
</h4>
<button type="button" class="btn btn-primary mb-4" id="btnPenggunaTambah" data-bs-toggle="modal" data-bs-target="#penggunaTambah">
  <span class="tf-icons bx bx-plus-circle"></span>&nbsp; Tambah Pengguna
</button>

<div class="card">
  <h5 class="card-header">List Data Pengguna</h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No.</th>
          <th>Username</th>
          <th>Nama Lengkap</th>
          <th>Level Login</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse($dataUser as $key=>$user)
        <tr>
          <td>{{ $dataUser->firstItem()+$key }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->nama }}</td>
          <td>{{ $user->hak_akses }}</td>
          <td>
            <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#" id="pengguna-edit-{{ $user->id }}" onClick="penggunaEdit(this)" data-id="{{ $user->id }}"><i class="bx bx-edit-alt me-1 text-primary"></i> Edit</a>
                <a class="dropdown-item" href="#" id="pengguna-del-{{ $user->id }}" onClick="penggunaDel(this)" data-id="{{ $user->id }}"><i class="bx bx-trash me-1 text-danger"></i> Hapus</a>
              </div>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5">Data tidak ditemukan.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
    <div class="demo-inline-spacing">
      <nav aria-label="Page navigation">
        {{ $dataUser->links('pagination::bootstrap-5') }}
      </nav>
    </div>
  </div>

  {{-- TOAST NOTIFIKASI --}}
  <div style="display:none">
    <select id="selectTypeOpt" class="form-select color-dropdown">
      <option value="{{Session::has('pengguna-error') ? 'bg-danger' : 'bg-success' }}">Success</option>
    </select>
    <select class="form-select placement-dropdown" id="selectPlacement">
      <option value="top-0 end-0">Top right</option>
    </select>
    <button id="showToastPlacement" class="btn btn-primary d-block">Show Toast</button>
  </div>

  <div class="bs-toast toast toast-placement-ex m-2" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
    <div class="toast-header">
      @if(Session::has('pengguna-error'))
      <i class='bx bx-error-alt me-2'></i>
      <div class="me-auto fw-semibold"> Error</div>
      @else
      <i class='bx bx-check me-2'></i>
      <div class="me-auto fw-semibold">Sukses</div>
      @endif
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">
      @if(Session::has('pengguna-tambah'))
        User baru berhasil ditambahkan.
      @endif
      
      @if(Session::has('pengguna-edit'))
        User berhasil diubah.
      @endif
      
      @if(Session::has('pengguna-delete'))
        Blog berhasil dihapus.
      @endif
      
      @if(Session::has('pengguna-error'))
        Terjadi kesalahan, atau username sudah terdaftar.
      @endif
    </div>
  </div>
</div>

<!-- Modal Add -->
<div class="modal fade" id="penggunaTambah" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Tambah Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/pengguna-tambah" method="post">
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}">
              @error('username')
                  <div class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" name="nama" value="{{ old('nama') }}">
              @error('nama')
                  <div class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" value="{{ old('password') }}">
              @error('password')
                  <div class="form-text text-danger">{{ $message }} Password harus mengandung huruf besar, kecil, dan angka.</div>
              @enderror
            </div>
          </div>

          <div class="row g-2">
            <div class="col mb-3">
              <label for="emailBasic" class="form-label">Level Login</label>
              <select class="form-select" aria-label="Default select example" name="hak_akses">
                <option selected="">Pilih Level Login</option>
                <option value="Administrator">Administrator</option>
                <option value="Mrkt">Mrkt</option>
                <option value="Csr">Csr</option>
              </select>
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
<div class="modal fade" id="penggunaEdit" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Pengguna</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/pengguna-edit" method="post">
        @csrf
        @method('patch')
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Username</label>
              <input type="hidden" id="idEdit" name="id">
              <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" id="usernameEdit" name="username" readonly>
              @error('username')
                  <div class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" id="namaEdit" name="nama" value="{{ old('nama') }}">
              @error('nama')
                  <div class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="row">
            <div class="col mb-3">
              <label for="nameBasic" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
              @error('password')
                  <div class="form-text text-danger">{{ $message }} Password harus mengandung huruf besar, kecil, dan angka.</div>
              @enderror
            </div>
          </div>

          <div class="row g-2">
            <div class="col mb-3">
              <label for="emailBasic" class="form-label">Level Login</label>
              <select class="form-select" aria-label="Default select example" id="hak_aksesEdit" name="hak_akses">
                <!-- <option selected="">Pilih Level Login</option>
                <option value="Administrator">Administrator</option>
                <option value="Mrkt">Mrkt</option>
                <option value="Csr">Csr</option> -->
              </select>
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
<div class="modal fade" id="penggunaDeleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="text-align:center;">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/dashboard/pengguna-delete" method="post">
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
          $("#btnPenggunaTambah").trigger("click");
      });
    </script>
    @endif
@endpush