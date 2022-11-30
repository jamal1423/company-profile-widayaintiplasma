@extends('backend.layout.main')

@section('content')
<h4 class="fw-bold">
  <span class="text-muted fw-light">Admin /</span> Akun Saya
</h4>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Akun Detail</h5>
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img src="{{ asset('backend/assets/img/avatars/avatar.jpg') }}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
        </div>
      </div>
      <hr class="my-0">
      <div class="card-body">
        @foreach($dataUser as $user)
        <form action="/dashboard/akun-saya/edit" method="POST">
          @csrf
          @method('patch')
          <div class="row">
            <div class="mb-3 col-md-12">
              <label for="firstName" class="form-label">Username</label>
              <input type="hidden" name="id" value="{{ $user->id }}">
              <input class="form-control" type="text" name="username" value="{{ $user->username }}" disabled>
            </div>
            <div class="mb-3 col-md-12">
              <label for="firstName" class="form-label">Nama Lengkap</label>
              <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama" value="{{ old('nama', $user->nama) }}">
              @error('nama')
                  <div class="form-text text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
              @error('password')
                <div class="form-text text-danger">{{ $message }} Password harus mengandung huruf besar, kecil, dan angka.</div>
              @enderror
            </div>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">Update Informasi</button>
            <a href="/dashboard"><button type="reset" class="btn btn-outline-secondary">Batal</button></a>
          </div>
        </form>
        @endforeach
      </div>
      <!-- /Account -->
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
    @if(Session::has('akun-error'))
      <i class='bx bx-error-alt me-2'></i>
      <div class="me-auto fw-semibold"> Error</div>
    @else
    <i class='bx bx-check me-2'></i>
    <div class="me-auto fw-semibold">Sukses</div>
    @endif
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    @if(Session::has('akun-edit'))
      Data berhasil diubah!
    @endif
    
    @if(Session::has('akun-error'))
      Error, ulangi proses.
    @endif
  </div>
</div>
@endsection