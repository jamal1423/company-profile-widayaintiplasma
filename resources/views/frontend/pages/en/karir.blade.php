@extends('frontend.layout.en.main')

@push('styles')
    <style>
      .om-right li{list-style:none;display:block;}
    </style>
@endpush

@section('content')
<!-- Start sbg -->
<section id="sbg">
  <div class="sbg">
    <div class="container">
      <div class="breadcrumb">
        <h1>Career</h1>
        <ol>
          <li><a href="/">Home</a></li>
          <li class="active">Career</li>
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
      <div class="row">
        @foreach($dataKarir as $karir)
        <div class="col-md-6" style="margin-bottom: 50px;">
          <div class="om-right">
            <h2 class="content">{{ $karir->title }}</h2>
            {!! $karir->deskripsi !!}
          </div>
        </div>
        @endforeach
      </div><!-- /.row -->
    </div><!-- .container -->
  </div><!-- .our-mission -->
</section><!-- /#our-mission -->
<!-- End our-mission -->
@endsection