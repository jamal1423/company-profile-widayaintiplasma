@extends('backend.layout.main')

@section('content')
<h4 class="fw-bold">
  <span class="text-muted fw-light">Admin /</span> Profil Perusahaan
</h4>


<div class="card">
<form action="/dashboard/setting-profile-edit" method="post">
  @csrf
  @method('patch')
  <div class="demo-inline-spacing card-header">
    <button type="submit" class="btn btn-outline-primary">
      <span class="tf-icons bx bx-edit-alt"></span>&nbsp; Update Profil
    </button>
  </div>

  <div class="table-responsive text-nowrap">
    <table class="table table-striped">
      <tbody class="table-border-bottom-0">
          @foreach($dataProfil as $profil)
          @endforeach
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Nama Perusahaan</strong></td>
            <td>:</td>
            <td><input type="hidden" name="id" value="{{ $profil->id }}"><input type="text" class="form-control" placeholder="Nama Perusahaan" name="nama_perusahaan" value="{{ $profil->nama_perusahaan }}"></td>
          </tr>
          
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Lokasi</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Lokasi" name="lokasi" value="{{ $profil->lokasi }}"></td>
          </tr>
          
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Kode Pos</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Kode Pos" name="kodepos" value="{{ $profil->kodepos }}"></td>
          </tr>
          
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Provinsi</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Provinsi" name="provinsi" value="{{ $profil->provinsi }}"></td>
          </tr>
          
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Negara</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Negara" name="negara" value="{{ $profil->negara }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Telepon</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Telepon" name="telp" value="{{ $profil->telp }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Fax</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Provinsi" name="fax" value="{{ $profil->fax }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Website</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Website" name="website" value="{{ $profil->website }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Email</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Email" name="email" value="{{ $profil->email }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Kontak</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Kontak" name="kontak" value="{{ $profil->kontak }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Tahun Didirikan</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Tahun Didirikan" name="tahun_didirikan" value="{{ $profil->tahun_didirikan }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Sektor Bisnis</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Sektor Bisnis" name="sektor_bisnis" value="{{ $profil->sektor_bisnis }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Bahasa</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Bahasa" name="bahasa" value="{{ $profil->bahasa }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Produk Utama</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Produk Utama" name="produk_utama" value="{{ $profil->produk_utama }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Merek</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Kontak" name="merek" value="{{ $profil->merek }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Volume</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Volume" name="volume" value="{{ $profil->volume }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Spesifikasi</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Spesifikasi" name="spesifikasi" value="{{ $profil->spesifikasi }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Komposisi Bahan</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Komposisi Bahan" name="komposisi_bahan" value="{{ $profil->komposisi_bahan }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Harga dan Jangka</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Harga dan Jangka" name="harga_jangka" value="{{ $profil->harga_jangka }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Pemesanan Minimal</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Pemesanan Minimal" name="minimum_order" value="{{ $profil->minimum_order }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Validitas Harga</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Validitas Harga" name="validitas_harga" value="{{ $profil->validitas_harga }}"></td>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Proses Manufaktur</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Proses Manufaktur" name="proses_manufaktur" value="{{ $profil->proses_manufaktur }}"></td>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Tenaga Kerja</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Tenaga Kerja" name="tenaga_kerja" value="{{ $profil->tenaga_kerja }}"></td>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Pendapatan Ekspor</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Pendapatan Ekspor" name="pendapatan_ekspor" value="{{ $profil->pendapatan_ekspor }}"></td>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Tujuan Ekspor</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Tujuan Ekspor" name="tujuan_ekspor" value="{{ $profil->tujuan_ekspor }}"></td>
          </tr>
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Jenis Bisnis Lainnya</strong></td>
            <td>:</td>
            <td><input type="text" class="form-control" placeholder="Jenis Bisnis Lainnya" name="jns_bisnis_lain" value="{{ $profil->jns_bisnis_lain }}"></td>
          </tr>
        </tbody>
      </table>
    </div>  
  </form>
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
    
    @if(Session::has('profil-edit'))
      Profil berhasil diubah.
    @endif
    
  </div>
</div>
@endsection
