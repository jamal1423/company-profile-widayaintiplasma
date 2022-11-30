@extends('frontend.layout.main')

@section('content')
<!-- Start sbg -->
<section id="sbg">
  <div class="sbg">
    <div class="container">
      <div class="breadcrumb">
        <h1>Blog</h1>
        <ol>
          <li><a href="/">Beranda</a></li>
          <li class="active">Blog</li>
        </ol>
      </div>
    </div><!-- /.container -->
  </div><!-- /.sbg -->
</section><!-- /#sbg -->
<!-- End sbg -->

<!-- Start blog -->
<section id="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8">
        @foreach($singleBlog as $blog)
        <div class="blog">
          <div class="b-img"><a href="/blog/detail/{{ $blog->slug }}"><img src="{{ asset('gambar-blog/'.$blog->foto) }}" alt="image" /></a></div>
          <div class="b-content">
            <time datetime="2016-10-19" class="icon">
              <span>{{ date('d',strtotime($blog->tglBerita)) }}</span>
              <strong>{{ date('M',strtotime($blog->tglBerita)) }}</strong>
            </time>
            <div class="b-txt">
              <h3><a href="/blog/detail/{{ $blog->slug }}">{{ $blog->title }}</a></h3>
                <strong> Bagikan ke : </strong>
                <a class="btn btn-success" style="background-color: #4caf50;" target="_blank" href="https://wa.me/?text={{$baseUrl.$blog->slug}}" role="button"> <span class="icon icon-whatsapp"></span> WhatsApp</a>
                <a class="btn btn-info" style="background-color: #3b5998;" target="_blank" href="http://www.facebook.com/sharer.php?u={{$baseUrl.$blog->slug}}" role="button"> <span class="icon icon-facebook"></span> Facebook</a>
                <a class="btn btn-info" style="background-color: #03a9f4;" target="_blank" href="http://twitter.com/share?text={{$baseUrl.$blog->slug}}" role="button"> <span class="icon icon-twitter"></span> Twitter</a>
            </div>
            <div class="b-txt2">
              <p>{!! $blog->deskripsi !!}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>	

      <div class="col-md-4 col-sm-4">
        <div class="blog-widget">
          <div class="right-side">
            <h5 class="border">Berita Lainnya</h5>
            <ul class="nav nav-tabs" role="tablist">
						</ul>
            <div class="rp">
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="post">
                  @foreach($blogLimit as $blogLain)
                  <div class="rp">
                    <div class="rp-img"><a href="/blog/detail/{{ $blogLain->slug }}"><img src="{{ asset('gambar-blog/'.$blogLain->foto) }}" alt="image" width="120px" /></a></div>
                    <div class="rp-txt">
                      <h5><a href="#">{{ Str::words(strip_tags($blogLain->title), 3, ' [...]') }}</a></h5>
                      <h6>{{ Str::words(strip_tags($blogLain->deskripsi), 10, ' [...]') }}&nbsp;<a href="/blog/detail/{{ $blogLain->slug }}">Selengkapnya</a></h6>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <div class="row text-center">
      <div class="col-lg-5">
        <ul class="pagination">
            <!-- <li>pagination disini</li> -->
        </ul>
      </div>
    </div>
  </div><!-- /.container -->
</section><!-- /#blog -->
@endsection