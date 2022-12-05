@extends('frontend.layout.main')

@section('content')
<!-- Start sbg -->
<section id="sbg">
  <div class="sbg">
    <div class="container">
      <div class="breadcrumb">
        <h1>Produk</h1>
        <ol>
          <li><a href="/">Beranda</a></li>
          <li class="active">Produk</li>
        </ol>
      </div>
    </div><!-- /.container -->
  </div><!-- /.sbg -->
</section><!-- /#sbg -->
<!-- End sbg -->

<!-- Start product -->
<section id="gallery">
  <div class="container">
    <div class="gallery3">
      <ul>
        @if(Request::is('id/produk'))
          @foreach($dataProduk as $produk)
          <li>
            <div class="contain">
              <div class="g-image">
                <img src="{{ asset('gambar-produk/'.$produk->foto) }}" alt="" />
              </div>
              <div class="g-overlay">
                <br>
                <br>
                <br>
                <br>
                <div class="search"><a href="{{ asset('gambar-produk/'.$produk->foto) }}" class="lsb-preview" data-lsb-group="gallery"><i class="fa fa-search-plus"></i></a></div>
              </div>
            </div>
          </li>
          @endforeach
        @endif
        
        @if(Request::is('id/produk/kid'))
          @foreach($produkKid as $kid)
          <li>
            <div class="contain">
              <div class="g-image">
                <img src="{{ asset('gambar-produk/'.$kid->foto) }}" alt="" />
              </div>
              <div class="g-overlay">
                <br>
                <br>
                <br>
                <br>
                <div class="search"><a href="{{ asset('gambar-produk/'.$kid->foto) }}" class="lsb-preview" data-lsb-group="gallery"><i class="fa fa-search-plus"></i></a></div>
              </div>
            </div>
          </li>
          @endforeach
        @endif
        
        @if(Request::is('id/produk/men'))
          @foreach($produkMen as $men)
          <li>
            <div class="contain">
              <div class="g-image">
                <img src="{{ asset('gambar-produk/'.$men->foto) }}" alt="" />
              </div>
              <div class="g-overlay">
                <br>
                <br>
                <br>
                <br>
                <div class="search"><a href="{{ asset('gambar-produk/'.$men->foto) }}" class="lsb-preview" data-lsb-group="gallery"><i class="fa fa-search-plus"></i></a></div>
              </div>
            </div>
          </li>
          @endforeach
        @endif
        
        @if(Request::is('id/produk/ladies'))
          @foreach($produkLadies as $ladies)
          <li>
            <div class="contain">
              <div class="g-image">
                <img src="{{ asset('gambar-produk/'.$ladies->foto) }}" alt="" />
              </div>
              <div class="g-overlay">
                <br>
                <br>
                <br>
                <br>
                <div class="search"><a href="{{ asset('gambar-produk/'.$ladies->foto) }}" class="lsb-preview" data-lsb-group="gallery"><i class="fa fa-search-plus"></i></a></div>
              </div>
            </div>
          </li>
          @endforeach
        @endif
      </ul>
    </div><!-- /.product -->
    <div class="row text-center">
      <div class="col-lg-0">
        @if(Request::is('id/produk'))
          {{ $dataProduk->links('pagination::bootstrap-4') }}
        @endif
        @if(Request::is('id/produk/kid'))
          {{ $produkKid->links('pagination::bootstrap-4') }}
        @endif
        @if(Request::is('id/produk/men'))
          {{ $produkMen->links('pagination::bootstrap-4') }}
        @endif
        @if(Request::is('id/produk/ladies'))
          {{ $produkLadies->links('pagination::bootstrap-4') }}
        @endif
      </div>
    </div>
  </div><!-- /.container -->
</section><!-- /#product -->
<!-- End product -->
@endsection