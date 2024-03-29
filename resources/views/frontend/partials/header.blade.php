<section id="header">
  <div class="container">
    <div class="header-top">
      <div class="h-left">
        <small> <p id="textSlogan"></p></small>
      </div>
      <div class="h-right">
        {{-- <ul id="urlSosmedHeader">
        </ul> --}}
        <ul>
          <li><a href="{{ url('/id') }}" class="title"><img src="{{ asset('gambar-umum/ind.png') }}"></a></li>
          <li><a href="#">|</a></li>
          <li><a href="{{ url('/') }}"><img src="{{ asset('gambar-umum/eng.png') }}"></a></li>
        </ul>
      </div>
    </div>
    <div class="header-bottom">
      <div class="logo"><a href="#"><img class="logo-custom" src="{{ asset('gambar-umum/logo.png') }}" alt="" /></a></div>
      <div class="head">
        <ul>
          <li class="hb">
            <h5>EMAIL SUPPORT</h5>
            <p><a href="mailto:marketing@widayaintiplasma.com">marketing@widayaintiplasma.com</a><br>&nbsp;</p>
          </li>
          <li class="hb">
            <h5>PUSAT LAYANAN</h5>
            <p>+6231-7886582<br>&nbsp;&nbsp;</p>
          </li>
          <li class="hb">
            <h5>JAM KERJA</h5>
            <p>Sen - Jum : 08:00 - 16:00<br>
              Sab : 08:00 - 13:00
            </p>
          </li>
                        
        </ul>
      </div>
    </div><!-- /.header-bottom -->
  </div><!-- /.container -->
</section><!-- /.header -->
<!-- End header -->



<!-- Start menu -->
<div id="menu">
  <div class="wrapper">
    <div class="container">
      <!-- START Responsive Menu HTML -->
      <div class="rm-container">
        <a class="rm-toggle rm-button rm-nojs" href="#">Menu</a>
        <nav class="rm-nav rm-nojs rm-lighten">
          <ul>
            <li class="{{Request::is('id') ? 'active' : '' }}"><a href="/id">Beranda</a></li>
            <li class="{{Request::is('id/tentang-kami') ? 'active' : '' }}"><a href="/id/tentang-kami">Tentang Kami</a></li>
            <li class="{{Request::is('id/produk') ? 'active' : '' }}"><a href="/id/produk">Produk<i class="fa fa-angle-down"></i></a>
              <ul>
                <li class="{{Request::is('id/produk/kid') ? 'active' : '' }}"><a href="/id/produk/kid">Anak</a></li>
                <li class="{{Request::is('id/produk/men') ? 'active' : '' }}"><a href="/id/produk/men">Pria</a></li>
                <li class="{{Request::is('id/produk/ladies') ? 'active' : '' }}"><a href="/id/produk/ladies">Wanita</a></li>
              </ul>
            </li>
            <li class="{{Request::is('id/galeri') ? 'active' : '' }}"><a href="/id/galeri">Galeri</a></li>
            <li class="@if(Request::is('id/blog') || Request::is('/idblog/*')) active @else @endif"><a href="/id/blog">Blog</a></li>
            <li class="{{Request::is('id/kontak') ? 'active' : '' }}"><a href="/id/kontak">Kontak</a></li>
          </ul>
        </nav>
      </div><!-- .rm-container -->
      <!-- End Responsive Menu HTML -->
    </div><!-- .container -->
  </div><!-- .wrapper -->
</div><!-- #menu -->
<!-- End menu -->