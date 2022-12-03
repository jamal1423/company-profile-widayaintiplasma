@extends('frontend.layout.en.main')

@section('content')
  <!-- Start slider -->
  <section id="slider">
    <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
      <div class="item active">
        @foreach($fotoSlider as $sliderAktif)
        @endforeach
        <img src="{{ asset('gambar-slider/'.$sliderAktif->foto) }}" alt="">
        <div class="overlay"></div>
        <div class="carousel-caption">
          <div class="s-content">
            <h1 id="textSlider1" class="wow" style="visibility: visible; animation-name: fadeIn; animation-duration: 3s; animation-delay: .2s;"></h1>
            <p id="textSlider2" class="wow" style="visibility: visible; animation-name: fadeIn; animation-duration: 3s; animation-delay: .2s;"></p>
            <div class="s-btn wow" style="visibility: visible;animation-name: fadeInUp;animation-duration: .5s; animation-delay: .5s;">
              <a href="/tentang-kami" class="btn btn-default">Learn More</a>
            </div>
          </div>
        </div>
      </div>
      @foreach($fotoSlider as $sliderLoop)
      <div class="item">
        <img src="{{ asset('gambar-slider/'.$sliderLoop->foto) }}" alt="">
        <div class="overlay"></div>
        <div class="carousel-caption">
          <div class="s-content">
            <h1 id="textSlider3" class="wow" style="visibility: visible; animation-name: fadeIn; animation-duration: 3s; animation-delay: .2s;"></h1>
            <p id="textSlider4" class="wow" style="visibility: visible; animation-name: fadeIn; animation-duration: 3s; animation-delay: .2s;"></p>
            <div class="s-btn wow" style="visibility: visible;animation-name: fadeInUp;animation-duration: .5s; animation-delay: .5s;">
              <a href="/tentang-kami" class="btn btn-default">Learn More</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      </div><!-- /.carousel-inner -->
    </div><!-- /.carousel-example-generic -->
  </section><!-- /#slider -->
  <!-- End slider -->
  
  <!-- Start slider-bottom -->
  <section id="slider-bottom">
    <div class="container">
      <div class="slider-bottom">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="s-bottom">
              <div class="s-top"></div>
              <div class="s-text">
                <div class="s-img"><i class="fa fa-headphones"></i></div>
                <div class="content">
                  <h4>Call Center</h4>
                  <p>+6231-7886582 <br>&nbsp;&nbsp;</p>
                </div>
                <div class="s-overlay">
                  <h4><a href="#">Call Center</a></h4>
                  <hr>
                  <p>+6231-7886582 <br>&nbsp;&nbsp;</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="s-bottom">
              <div class="s-top"></div>
              <div class="s-text">
                <div class="s-img"><i class="fa fa-envelope"></i></div>
                <div class="content">
                  <h4>E-Mail</h4>
                  <p>Email Marketing<br>marketing@widayaintiplasma.com</p>
                </div>
              </div>
              <div class="s-overlay">
                <h4><a href="#">E-Mail</a></h4>
                <hr>
                <p>Email Marketing<br>marketing@widayaintiplasma.com</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="s-bottom">
              <div class="s-top"></div>
              <div class="s-text">
                <div class="s-img"><i class="fa fa-clock-o"></i></div>
                <div class="content">
                  <h4>Working Hours</h4>
                  <p>Mon - Fri : 08:00 - 16:00<br>
                  Sat : 08:00 - 13:00
                </p>
                </div>
              </div>
              <div class="s-overlay">
                <h4><a href="#">Working Hours</a></h4>
                <hr>
                <p>Mon - Fri : 08:00 - 16:00<br>
                  Sat : 08:00 - 13:00
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="s-bottom">
              <div class="s-top"></div>
              <div class="s-text">
                <div class="s-img"><i class="fa fa-map-marker"></i></div>
                <div class="content">
                  <h4>Our Location</h4>
                  <p>Jl. Industri Bringin Bendo 8<br>Taman, Sidoarjo - Indonesia</p>
                </div>
              </div>
              <div class="s-overlay">
                <h4><a href="#">Our Location</a></h4>
                <hr>
                <p>Jl. Industri Bringin Bendo 8<br>Taman, Sidoarjo - Indonesia</p>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.slider-bottom -->	
    </div><!-- /.container -->
  </section><!-- /#slider-bottom -->
  <!-- End slider-bottom -->
  
  <!-- Start planet -->
  <section id="planet">
    <div class="planet">
      <div class="container">
        <div class="p-header">
          <h1 class="title">Welcome</h1>
          <hr />
          <p id="textPembukaan"></p>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="p-left">
            <div class="p-left">
								<br>
								<br>
								<section>
									<div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
									 <div class="carousel-inner" role="listbox">
											<div class="item active">
                        @foreach($homeAboutFoto as $homeFotoActive)
                        @endforeach
												<img src="{{ asset('gambar-home-about/'.$homeFotoActive->foto) }}" alt="">
												<div class="overlay"></div>
											</div>
											@foreach($homeAboutFoto as $homeFoto)
                        <div class="item">
                          <img src="{{ asset('gambar-home-about/'.$homeFoto->foto) }}" alt="">
                          <div class="overlay"></div>
                        </div>
                      @endforeach
										</div>
									</div>
								</section>
							</div>
              <!-- <div class="p-img"><img src="{{ asset('frontend/assets/images/pimg.png') }}" alt="" /></div> -->
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-right">
              <div class="p-content">
                <h5>Who We Are?</h5>
                @foreach($aboutUs as $about)
                <div class="pl-txt">
                  <p>{{ Str::words(strip_tags($about->deskripsi), 25, ' [...]') }} <a href="/tentang-kami">Learn More</a></p>
                </div>
                <div class="p-txt" style="margin-top:1rem;">
                  <p>Vision :</p>
                    {!! $about->visi !!}
                  <p> </p>
                  <p>Mission :</p>
                    {!! $about->misi !!}
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.planet -->
  </section><!-- /#planet -->
  <!-- End planet -->
  
  <!-- Start our cargo -->
  <section id="our-cargo">
    <div class="our-cargo">
      <div class="container">
        <div class="our-header">
          <h1 class="title">Gallery</h1>
          <hr />
        </div>
      </div><!-- /.container -->
      <div class="c-img">
        <div class="row">
          @foreach($dataGaleri as $galeri)
          <div class="col-md-3 col-sm-6">
            <div class="contain">
              <div class="cargo-img">
                <img src="{{ asset('gambar-galeri/'.$galeri->foto) }}" alt="" />
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div><!-- /.row -->
    </div><!-- /.our-cargo -->
  </section><!-- /#our-cargo -->
  <!-- End our-cargo -->
  
  <!-- Start latest post -->
  <section id="lp-post">
    <div class="container">
      <div class="lp-post text-center">
        <div class="p-header">
          <h1 class="title">News About PT. Widaya Inti Plasma</h1>
          <hr />
          <br>
          <!--<p>News and Events in the company PT. Widaya Inti Plasma.</p>-->
        </div>
        <div class="row">
          @foreach($dataBlog as $blog)
          <div class="col-md-4 col-sm-6">
            <div class="lp-content">
              <div class="contain">
                <div class="lp-img"><img src="{{ asset('gambar-blog/'.$blog->foto) }}" alt="" /></div>
                <div class="textbox">
                  <a href="/blog/detail/{{ $blog->slug }}"><i class="fa fa-search"></i></a>
                </div>
              </div>
              <div class="lp-txt">
                <time datetime="" class="icon">
                  <span>{{ date('d',strtotime($blog->tglBerita)) }}</span>
                  <strong>{{ date('M',strtotime($blog->tglBerita)) }}</strong>
                </time>
                <div class="lp-text">
                  <h3><a href="#">{{ $blog->title }}</a></h3>
                  <!-- <span>by <a href="#">{{ strtoupper($blog->userlog) }}</a> </span> -->
                  <p>{{ Str::words(strip_tags($blog->deskripsi), 15, ' [...]') }}<a href="/blog/detail/{{ $blog->slug }}">&nbsp;Learn More</a></p>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div><!-- /.row -->
      </div><!-- /.lp-post -->
    </div><!-- /.container -->
  </section><!-- /#lp-post -->
  <!-- End latest post -->

  <!-- Start info -->
  <div id="map" class="ev-map-display"></div>
  <!-- end info -->
@endsection
