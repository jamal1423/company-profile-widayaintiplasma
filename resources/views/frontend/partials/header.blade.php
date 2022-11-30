<section id="header">
  <div class="container">
    <div class="header-top">
      <div class="h-left">
        <small> <p id="textSlogan"></p></small>
      </div>
      <div class="h-right">
        <ul id="urlSosmedHeader">
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
            <li class="{{Request::is('/') ? 'active' : '' }}"><a href="/">Beranda</a></li>
            <li class="{{Request::is('tentang-kami') ? 'active' : '' }}"><a href="/tentang-kami">Tentang Kami</a></li>
            <li class="{{Request::is('produk') ? 'active' : '' }}"><a href="/produk">Produk<i class="fa fa-angle-down"></i></a>
              <ul>
                <li class="{{Request::is('produk/kid') ? 'active' : '' }}"><a href="/produk/kid">Anak</a></li>
                <li class="{{Request::is('produk/men') ? 'active' : '' }}"><a href="/produk/men">Pria</a></li>
                <li class="{{Request::is('produk/ladies') ? 'active' : '' }}"><a href="/produk/ladies">Wanita</a></li>
              </ul>
            </li>
            <li class="{{Request::is('galeri') ? 'active' : '' }}"><a href="/galeri">Galeri</a></li>
            <li class="@if(Request::is('blog') || Request::is('blog/*')) active @else @endif"><a href="/blog">Blog</a></li>
            <li class="{{Request::is('kontak') ? 'active' : '' }}"><a href="/kontak">Kontak</a></li>
          </ul>
        </nav>
      </div><!-- .rm-container -->
      <!-- End Responsive Menu HTML -->
    </div><!-- .container -->
  </div><!-- .wrapper -->
</div><!-- #menu -->
<!-- End menu -->