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
            <h5>CALL SUPPORT</h5>
            <p>+6231-7886582<br>&nbsp;&nbsp;</p>
          </li>
          <li class="hb">
            <h5>WORKING HOURS</h5>
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
            <li class="{{Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
            <li class="{{Request::is('about-us') ? 'active' : '' }}"><a href="/about-us">About Us</a></li>
            <li class="{{Request::is('product') ? 'active' : '' }}"><a href="/product">Product<i class="fa fa-angle-down"></i></a>
              <ul>
                <li class="{{Request::is('product/kid') ? 'active' : '' }}"><a href="/product/kid">Kid</a></li>
                <li class="{{Request::is('product/men') ? 'active' : '' }}"><a href="/product/men">Men</a></li>
                <li class="{{Request::is('product/ladies') ? 'active' : '' }}"><a href="/product/ladies">Ladies</a></li>
              </ul>
            </li>
            <li class="{{Request::is('gallery') ? 'active' : '' }}"><a href="/gallery">Gallery</a></li>
            <li class="@if(Request::is('blog') || Request::is('blog/*')) active @else @endif"><a href="/blog">Blog</a></li>
            <li class="{{Request::is('contact') ? 'active' : '' }}"><a href="/contact">Contact</a></li>
          </ul>
        </nav>
      </div><!-- .rm-container -->
      <!-- End Responsive Menu HTML -->
    </div><!-- .container -->
  </div><!-- .wrapper -->
</div><!-- #menu -->
<!-- End menu -->