@extends('frontend.layout.en.main')

@section('content')
<!-- Start sbg -->
<section id="sbg">
  <div class="sbg">
    <div class="container">
      <div class="breadcrumb">
        <h1>Galeri</h1>
        <ol>
          <li><a href="/">Beranda</a></li>
          <li class="active">Galeri</li>
        </ol>
      </div>
    </div><!-- /.container -->
  </div><!-- /.sbg -->
</section><!-- /#sbg -->
<!-- End sbg -->

<!-- Start Gallery -->
<section id="gallery">
  <div class="container">
    <div class="gallery2">
      <ul>
        @foreach($dataGaleri as $galeri)
        <li>
          <div class="contain">
            <div class="g-image">
              <img src="{{ asset('gambar-galeri/'.$galeri->foto) }}" alt="" />
            </div>
            <div class="g-overlay">
              <br>
              <br>
              <br>
              <div class="search"><a href="{{ asset('gambar-galeri/'.$galeri->foto) }}" class="lsb-preview" data-lsb-group="gallery"><i class="fa fa-search-plus"></i></a></div>
            </div>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
    <div class="row text-center">
      <div class="col-lg-0">
        <ul class="pagination">
          <!-- pagination disini -->
        </ul>
      </div>
    </div>
  </div>
</section><!-- /#gallery -->
		<!-- End Gallery -->
		
		<!-- Start g-footer -->
		<section id="g-footer">
			<div class="g-footer">
				<div class="gimg"><img src="{{ asset('gambar-umum/gf1.png') }}" alt="" /></div>
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="g-txt">
								<h2>PT. Widaya Inti Plasma</h2>
								<p id="textPembukaan3" style="font-size:14px;"></p>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="g-icon">
								<a href="/kontak">Lokasi<span>|</span><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!-- /#g-footer -->
		<!-- End g-footer -->

@endsection