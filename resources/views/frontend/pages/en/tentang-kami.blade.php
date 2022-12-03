@extends('frontend.layout.en.main')

@section('content')
<!-- Start sbg -->
<section id="sbg">
  <div class="sbg">
    <div class="container">
      <div class="breadcrumb">
        <h1>About Us</h1>
        <ol>
          <li><a href="/">Home</a></li>
          <li class="active">About Us</li>
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
            <h2 class="content">Welcome to PT. Widaya Inti Plasma</h2>
            <p> {!! $aboutUs->deskripsi !!} </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="om-right">
            <h2 class="content">Vision</h2>
            {!! $aboutUs->visi !!}
            <br>
            <h2 class="content">Mission</h2>
            {!! $aboutUs->misi !!}
          </div>
        </div>
        @endforeach

        <div class="col-md-12" style="margin-top:3rem;">
          <div class="om-left">
            <h2 class="content">Profile</h2>
            @foreach($dataProfil as $profil)    
            <div class="table-responsive">
              <table class="table m-b-0">
                <tbody>
                <tr>
                  <td>Company Name</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->nama_perusahaan }} </td>
                </tr>
                <tr>
                  <td>Location</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->lokasi }} </td>
                </tr>
                <tr>
                  <td>Postal Code</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->kodepos }} </td>
                </tr>
                <tr>
                  <td>Province</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->provinsi }} </td>
                </tr>
                <tr>
                  <td>Country</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->negara }} </td>
                </tr>
                <tr>
                  <td>Phone</td>
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
                  <td>Contact Person</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->kontak }} </td>
                </tr>
                <tr>
                  <td>Year Established</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->tahun_didirikan }} </td>
                </tr>
                <tr>
                  <td>Bussiness Sector</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->sektor_bisnis }} </td>
                </tr>
                <tr>
                  <td>Language</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->bahasa }} </td>
                </tr>
                <tr>
                  <td>Main Products</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->produk_utama }} </td>
                </tr>
                <tr>
                  <td>Brand</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->merek }} </td>
                </tr>
                <tr>
                  <td>Volume</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->volume }} </td>
                </tr>
                <tr>
                  <td>Specifications</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->spesifikasi }} </td>
                </tr>
                <tr>
                  <td>Material Composition</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->komposisi_bahan }} </td>
                </tr>
                <tr>
                  <td>Price and Term</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->harga_jangka }} </td>
                </tr>
                <tr>
                  <td>Minimum Order</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->minimum_order }} </td>
                </tr>
                <tr>
                  <td>Price Validity</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->validitas_harga }} </td>
                </tr>
                <tr>
                  <td>Manufacturing Process</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->proses_manufaktur }} </td>
                </tr>
                <tr>
                  <td>Manpower</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->tenaga_kerja }} </td>
                </tr>
                <tr>
                  <td>Export Revenue</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->pendapatan_ekspor }} </td>
                </tr>
                <tr>
                  <td>Export Destination</td>
                  <td align="center"><b>:</b></td>
                  <td> {{ $profil->tujuan_ekspor }} </td>
                </tr>
                <tr>
                  <td>Other Bussiness Type</td>
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