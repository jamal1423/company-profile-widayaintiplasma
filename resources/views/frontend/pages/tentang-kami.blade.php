@extends('frontend.layout.main')

@section('content')
<!-- Start sbg -->
<section id="sbg">
  <div class="sbg">
    <div class="container">
      <div class="breadcrumb">
        <h1>Tentang Kami</h1>
        <ol>
          <li><a href="/">Beranda</a></li>
          <li class="active">Tentang kami</li>
        </ol>
      </div>
    </div><!-- /.container -->
  </div><!-- /.sbg -->
</section><!-- /#sbg -->
<!-- End sbg -->

<!-- Start our-mission -->
<section id="our-mission">
  <div class="our-mission">
    <div class="container">
      @foreach($dataAboutUs as $aboutUs)
      <div class="om-img"><img src="{{ asset('gambar-about-us/'.$aboutUs->foto) }}" alt="" /></div>
      <div class="row">
        <div class="col-md-6">
          <div class="om-left">
            <h2 class="content">Selamat Datang Di PT. Widaya Inti Plasma</h2>
            <p> {!! $aboutUs->deskripsi !!} </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="om-right">
            <h2 class="content">Visi</h2>
            {!! $aboutUs->visi !!}
            <br>
            <h2 class="content">Misi</h2>
            {!! $aboutUs->misi !!}
          </div>
        </div>
        @endforeach

        <div class="col-md-12" style="margin-top:3rem;">
          <div class="om-left">
            <h2 class="content">Profil</h2>
            @foreach($dataProfil as $profil)    
            <div class="table-responsive">
              <table class="table m-b-0">
                <tbody>
                <tr>
                  <td>Nama Perusahaan</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->nama_perusahaan }} </td>
                </tr>
                <tr>
                  <td>Lokasi</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->lokasi }} </td>
                </tr>
                <tr>
                  <td>Kode Pos</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->kodepos }} </td>
                </tr>
                <tr>
                  <td>Provinsi</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->provinsi }} </td>
                </tr>
                <tr>
                  <td>Negara</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->negara }} </td>
                </tr>
                <tr>
                  <td>Telepon</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->telp }} </td>
                </tr>
                <tr>
                  <td>Fax</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->fax }} </td>
                </tr>
                <tr>
                  <td>Website</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->website }} </td>
                </tr>
                <tr>
                  <td>E-mail</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->email }} </td>
                </tr>
                <tr>
                  <td>Kontak Pribadi</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->kontak }} </td>
                </tr>
                <tr>
                  <td>Tahun Didirikan</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->tahun_didirikan }} </td>
                </tr>
                <tr>
                  <td>Sektor Bisnis</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->sektor_bisnis }} </td>
                </tr>
                <tr>
                  <td>Bahasa</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->bahasa }} </td>
                </tr>
                <tr>
                  <td>Produk Utama</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->produk_utama }} </td>
                </tr>
                <tr>
                  <td>Merek</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->merek }} </td>
                </tr>
                <tr>
                  <td>Volume</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->volume }} </td>
                </tr>
                <tr>
                  <td>Spesifikasi</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->spesifikasi }} </td>
                </tr>
                <tr>
                  <td>Komposisi Bahan</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->komposisi_bahan }} </td>
                </tr>
                <tr>
                  <td>Harga dan Jangka</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->harga_jangka }} </td>
                </tr>
                <tr>
                  <td>Minimum Order</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->minimum_order }} </td>
                </tr>
                <tr>
                  <td>Validitas Harga</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->validitas_harga }} </td>
                </tr>
                <tr>
                  <td>Proses Manufaktur</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->proses_manufaktur }} </td>
                </tr>
                <tr>
                  <td>Tenaga Kerja</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->tenaga_kerja }} </td>
                </tr>
                <tr>
                  <td>Pendapatan Ekspor</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->pendapatan_ekspor }} </td>
                </tr>
                <tr>
                  <td>Tujuan Ekspor</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->tujuan_ekspor }} </td>
                </tr>
                <tr>
                  <td>Tipe Bisnis Lainnya</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->jns_bisnis_lain }} </td>
                </tr>
                </tbody>
              </table>
            </div>
            @endforeach
          </div>
        </div>
      </div><!-- /.row -->
    </div><!-- .container -->
  </div><!-- .our-mission -->
</section><!-- /#our-mission -->
<!-- End our-mission -->
@endsection