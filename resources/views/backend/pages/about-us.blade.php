@extends('backend.layout.main')

@section('content')
<h4 class="fw-bold">
  <span class="text-muted fw-light">Admin /</span> About Us
</h4>
<div class="row mb-5">

  <div class="col-xl-12 col-12">
    <div class="nav-align-top mb-4">
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-indonesia" aria-controls="navs-top-indonesia" aria-selected="true">Indonesia</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-english" aria-controls="navs-top-english" aria-selected="false">English</button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-top-indonesia" role="tabpanel">
          @forelse($aboutUs as $about)
          <div class="col-md-6 col-lg-12 mb-3">
            <div class="card h-100">
              <img class="card-img-top" src="{{ asset('gambar-about-us/'.$about->foto) }}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Tentang Kami</h5>
                <p class="card-text">
                {{ Str::words(strip_tags($about->deskripsi), 50, ' [...]') }}
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-12 mb-3">
            <div class="card">
              <h5 class="card-header">Visi</h5>
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>
                    {!! $about->visi !!}
                  </p>
                </blockquote>
              </div>
              
              <h5 class="card-header">Misi</h5>
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>
                    {!! $about->misi !!}
                  </p>
                </blockquote>
              </div>
            </div>
          </div>

          <a href="/dashboard/setting-about-us/detail/{{ base64_encode($about->id) }}/{{ base64_encode('id') }}"><button type="button" class="btn btn-outline-secondary"><i class="bx bxs-message-square-edit text-info"></i> Edit</button></a>
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
        <div class="tab-pane fade" id="navs-top-english" role="tabpanel">
          @forelse($aboutUsEn as $aboutEn)
          <div class="col-md-6 col-lg-12 mb-3">
            <div class="card h-100">
              <img class="card-img-top" src="{{ asset('gambar-about-us/'.$aboutEn->foto) }}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">About Us</h5>
                <p class="card-text">
                {{ Str::words(strip_tags($aboutEn->deskripsi), 50, ' [...]') }}
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-12 mb-3">
            <div class="card">
              <h5 class="card-header">Vision</h5>
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>
                    {!! $aboutEn->visi !!}
                  </p>
                </blockquote>
              </div>
              
              <h5 class="card-header">Mission</h5>
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>
                    {!! $aboutEn->misi !!}
                  </p>
                </blockquote>
              </div>
            </div>
          </div>

          <a href="/dashboard/setting-about-us/detail/{{ base64_encode($aboutEn->id) }}/{{ base64_encode('en') }}"><button type="button" class="btn btn-outline-secondary"><i class="bx bxs-message-square-edit text-info"></i> Edit</button></a>
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
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="aboutEdit" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Ubah Data About</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="row">
          <div class="col mb-3">
            <label for="nameBasic" class="form-label">Deskripsi</label>
            <!-- <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> -->
            <input id="w" type="hidden" name="content">
            <trix-editor input="w"></trix-editor>
          </div>
        </div>

        <div class="row">
          <div class="col mb-3">
            <label for="nameBasic" class="form-label">Visi</label>
            <input id="x" type="hidden" name="content">
            <trix-editor input="x"></trix-editor>
          </div>
        </div>

        <div class="row">
          <div class="col mb-3">
            <label for="nameBasic" class="form-label">Misi</label>
            <input id="y" type="hidden" name="content">
            <trix-editor input="y"></trix-editor>
          </div>
        </div>
        
        <div class="row">
          <div class="col mb-3">
            <label for="nameBasic" class="form-label">Foto About</label>
            <div class="input-group">
              <input type="file" class="form-control" id="inputGroupFile01">
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>
@endsection
