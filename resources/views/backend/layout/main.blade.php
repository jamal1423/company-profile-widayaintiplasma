<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Admin | PT. Widaya Inti Plasma</title>
    
    <meta name="description" content="PT. Widaya Inti Plasma" />
    <meta name="keywords" content="PT. Widaya Inti Plasma">
        
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('gambar-umum/logo_wip.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/boxicons.css') }}" />
    
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/trix.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/sweetalert.css') }}">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->
    
    <style>
      trix-toolbar [data-trix-button-group="file-tools"],
      trix-toolbar [data-trix-attribute='quote'],
      trix-toolbar [data-trix-attribute='code'],
      trix-toolbar [data-trix-attribute='heading1'] {
        display: none;
      }
    </style>
    
    <!-- Helpers -->
    <script src="{{ asset('backend/assets/vendor/js/helpers.js') }}"></script>

    <script src="{{ asset('backend/assets/js/config.js') }}"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'GA_MEASUREMENT_ID');
    </script>

</head>

<body>

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">
      
      <!-- MENU NAV -->
      @include('backend.partials.menu-nav')

      <div class="layout-page">
        <!-- Menu Header -->
        @include('backend.partials.header')
    
        <!-- Content wrapper -->
        <div class="content-wrapper">
          
          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- isi content -->
            @yield('content')  
          </div>
          
          @include('backend.partials.footer')
          
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->
  
  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="{{ asset('backend/assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  
  <script src="{{ asset('backend/assets/vendor/js/menu.js') }}"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{ asset('backend/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('backend/assets/js/main.js') }}"></script>
  
  <script src="{{ asset('backend/assets/js/trix.js') }}"></script>
  <script>
		document.addEventListener('trix-file-accept', function(e) {
			e.preventDefault();
		});
	</script>

  <!-- Modals -->
  <script src="{{ asset('backend/assets/js/ui-modals.js') }}"></script>

  
  <!-- Page JS -->
  <script src="{{ asset('backend/assets/js/dashboards-analytics.js') }}"></script>
  <!-- <script async defer src="../../../buttons.github.io/buttons.js"></script>   -->
  <script src="{{ asset('backend/assets/js/ui-toasts.js') }}"></script>
  <script src="{{ asset('backend/assets/js/sweetalert.js') }}"></script>
	<script src="{{ asset('backend/assets/js/sweetalert1.js') }}"></script>

  @stack('scripts')

  <script>
    $(document).ready(function() {
      $('.modal').on('shown.bs.modal', function() {
				$(this).find('input:visible:first').focus();
			});

			$(document).on('select2:open', () => {
				document.querySelector('.select2-search__field').focus();
			});

      $.ajax({
				url: "/total-produk",
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					$('#totalProduk').text(data);
				}
			});

      $.ajax({
				url: "/total-user",
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					$('#totalUser').text(data);
				}
			});
      
      $.ajax({
				url: "/total-galeri",
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					$('#totalGaleri').text(data);
				}
			});
      
      $.ajax({
				url: "/total-blog",
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					$('#totalBlog').text(data);
				}
			});
      
      $.ajax({
				url: "/total-slider",
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					$('#totalSlider').text(data);
				}
			});
      
      $.ajax({
				url: "/total-sosmed",
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					$('#totalSosmed').text(data);
				}
			});

    });
  </script>

  <!-- NOTIFIKASI PRODUK -->
  @if(Session::has('produk-tambah'))
	<!-- <script>
		$(document).ready(function() {
			Swal.fire({
				title: "Sukses!",
				text: "Produk berhasil ditambahkan.",
				type: "success",
				confirmButtonClass: "btn btn-primary",
				buttonsStyling: !1
			})
		});
	</script> -->
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

  @if(Session::has('produk-edit'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
  @endif
  
  @if(Session::has('produk-delete'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

  <!-- NOTIFIKASI BLOG -->
  @if(Session::has('blog-tambah'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
  
  @if(Session::has('blog-edit'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
  
  @if(Session::has('blog-delete'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

  <!-- NOTIFIKASI GALERI -->
  @if(Session::has('galeri-tambah'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
  
  @if(Session::has('galeri-edit'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
  
  @if(Session::has('galeri-delete'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

  <!-- NOTIFIKASI PENGGUNA -->
  @if(Session::has('pengguna-tambah'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
  
  @if(Session::has('pengguna-edit'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
  
  @if(Session::has('pengguna-delete'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

  @if(Session::has('pengguna-error'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
  
  <!-- NOTIFIKASI SLIDER -->
  @if(Session::has('slider-tambah'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
  
  @if(Session::has('slider-edit'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
  
  @if(Session::has('slider-delete'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

  @if(Session::has('slider-error'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

  <!-- NOTIFIKASI HOME ABOUT -->
  @if(Session::has('about-home-tambah'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
  
  @if(Session::has('about-home-edit'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
  
  @if(Session::has('about-home-delete'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

  @if(Session::has('about-home-error'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

  <!-- NOTIFIKASI ABOUT US -->
  @if(Session::has('about-us-edit'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
  
  <!-- NOTIFIKASI PROFIL -->
  @if(Session::has('profil-edit'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

  <!-- NOTIFIKASI URL -->
  @if(Session::has('url-tambah'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
  
  @if(Session::has('url-edit'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
  
  @if(Session::has('url-delete'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

  @if(Session::has('url-error'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

	@if(Session::has('akun-edit'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

	@if(Session::has('akun-error'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

	@if(Session::has('karir-tambah'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
	
	@if(Session::has('karir-edit'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif
	
	@if(Session::has('karir-delete'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

	@if(Session::has('karir-error'))
  <script>
    window.onload = function() {
      $("#showToastPlacement").click();
      }
	</script>
	@endif

  <script>

    //============ PRODUK ============
    function produkEdit(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/get-data-produk/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var imgElement = $('#img');
					imgElement.empty();

          console.log(data)

          var selectElement = $('#jenis_produkEdit')   
          selectElement.empty();
          selectElement.append(`
          <option value="Sepatu">Sepatu</option>
          <option value="Sandal">Sandal</option>
          `)
          $("#jenis_produk option[value='" + data.jenis_produk + "']").attr("selected", "selected");
          
          var selectElement2 = $('#tipe_produkEdit')
          selectElement2.empty();
          selectElement2.append(`
              <option value="Kid">Kids</option>
              <option value="Men">Mens</option>
              <option value="Ladies">Ladies</option>
          `)
          $("#tipe_produkEdit option[value='" + data.tipe_produk + "']").attr("selected", "selected");

					$('#id').val(data.id);
					$('#artikelEdit').val(data.artikel);
          $('#oldImage').val(data.foto);
					$('#produkEditModal').modal('show');

					var imgs = data.foto;
					var elem = document.createElement("img");
					elem.setAttribute("src", "/gambar-produk/" + imgs);
          elem.className="avatar avatar-xl pull-up";
					document.getElementById("img").appendChild(elem);
				}
			});
		}

    function produkDel(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/get-data-produk/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
          console.log(data)
          var imgElement = $('#img-del');
					imgElement.empty();

					$('#id-del').val(data.id);
					$('#label-del').text(data.artikel);
					$('#oldImage-del').val(data.foto);
					$('#produkDeleteModal').modal('show');

          var imgs_del = data.foto;
					var elem_del= document.createElement("img");
					elem_del.setAttribute("src", "/gambar-produk/" + imgs_del);
          elem_del.className="avatar avatar-xl pull-up";
					document.getElementById("img-del").appendChild(elem_del);
				}
			});
		}

    //============ BLOG ============

    // function blogEdit(element) {
		// 	var id = $(element).attr('data-id');
		// 	$.ajax({
		// 		url: "/dashboard/get-data-blog/" + id,
		// 		type: "GET",
		// 		dataType: "JSON",
		// 		success: function(data) {
		// 			var imgElement = $('#img');
		// 			imgElement.empty();

    //       console.log(data)

		// 			$('#idDel').val(data.id);
		// 			$('#titleEdit').val(data.title);
		// 			$('#oldTitle').val(data.title);
    //       $('#oldImage').val(data.foto);
    //       $('#deskripsiEdit').val(data.deskripsi);
		// 			$('#blogEdit').modal('show');

		// 			var imgs = data.foto;
		// 			var elem = document.createElement("img");
		// 			elem.setAttribute("src", "/gambar-blog/" + imgs);
    //       elem.className="rounded-circle avatar avatar-xl pull-up";
		// 			document.getElementById("img").appendChild(elem);
		// 		}
		// 	});
		// }
    
    function blogPreview(element) {
			var id = $(element).attr('data-id');
			var bahasa = $(element).attr('data-bahasa');
			$.ajax({
				url: "/dashboard/get-data-blog/" + id + "/" + bahasa,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var imgElement = $('#imgPrev');
					imgElement.empty();

          console.log(data)

					$('#titlePreview').text(data.title);
					$('#deskripsiPreview').html(data.deskripsi);
					$('#tglPreview').text(data.tglBerita);
					$('#blogPreview').modal('show');
          
					var imgs = data.foto;
					var elem = document.createElement("img");
					elem.setAttribute("src", "/gambar-blog/" + imgs);
          elem.className="img-thumbnail img-fluid";
          document.getElementById("imgPrev").appendChild(elem);
				}
			});
		}

    function blogDel(element) {
			var id = $(element).attr('data-id');
			var bahasa = $(element).attr('data-bahasa');
			$.ajax({
				url: "/dashboard/get-data-blog/" + id + "/" + bahasa,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
          console.log(data)
          var imgElement = $('#img-del');
					imgElement.empty();
					
					$('#bahasa-del').val(bahasa);

					$('#id-del').val(data.id);
					$('#label-del').text(data.title);
					$('#oldImage-del').val(data.foto);
					$('#blogDeleteModal').modal('show');

          var imgs_del = data.foto;
					var elem_del= document.createElement("img");
					elem_del.setAttribute("src", "/gambar-blog/" + imgs_del);
          elem_del.className="avatar avatar-xl pull-up";
					document.getElementById("img-del").appendChild(elem_del);
				}
			});
		}

    //============ GALERI ============
    function galeriEdit(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/get-data-galeri/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var imgElement = $('#img');
					imgElement.empty();

					$('#idEdit').val(data.id);
					$('#judulEdit').val(data.judul);
          $('#oldImage').val(data.foto);
          $('#deskripsiEdit').val(data.deskripsi);
					$('#galeriEdit').modal('show');

					var imgs = data.foto;
					var elem = document.createElement("img");
					elem.setAttribute("src", "/gambar-galeri/" + imgs);
          elem.className="avatar avatar-xl pull-up";
					document.getElementById("img").appendChild(elem);
				}
			});
		}

    function galeriDel(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/get-data-galeri/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
          console.log(data)
          var imgElement = $('#img-del');
					imgElement.empty();

					$('#id-del').val(data.id);
					$('#judul-del').text(data.judul);
					$('#oldImage-del').val(data.foto);
					$('#galeriDeleteModal').modal('show');

          var imgs_del = data.foto;
					var elem_del= document.createElement("img");
					elem_del.setAttribute("src", "/gambar-galeri/" + imgs_del);
          elem_del.className="avatar avatar-xl pull-up";
					document.getElementById("img-del").appendChild(elem_del);
				}
			});
		}

    //============ PENGGUNA ============
    function penggunaEdit(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/get-data-pengguna/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
          var selectElement = $('#hak_aksesEdit')
          selectElement.empty();

          selectElement.append(`
            <option value="- Pilih level -">Pilih Level Login</option>
            <option value="Administrator">Administrator</option>
            <option value="Mrkt">Mrkt</option>
            <option value="Csr">Csr</option>
          `)

          $("#hak_aksesEdit option[value='" + data.hak_akses + "']").attr("selected", "selected");

					$('#idEdit').val(data.id);
					$('#usernameEdit').val(data.username);
          $('#namaEdit').val(data.nama);
          $('#penggunaEdit').modal('show');
				}
			});
		}

    function penggunaDel(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/get-data-pengguna/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
          $('#id-del').val(data.id);
					$('#label-del').text(data.nama);
					$('#nama-del').val(data.nama);
					$('#penggunaDeleteModal').modal('show');
				}
			});
		}

    //============ SLIDER ============
    function sliderEdit(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/get-data-slider/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var imgElement = $('#img');
					imgElement.empty();

					$('#idEdit').val(data.id);
					$('#deskripsiEdit').val(data.deskripsi);
          $('#oldImage').val(data.foto);
          $('#sliderEdit').modal('show');

					var imgs = data.foto;
					var elem = document.createElement("img");
					elem.setAttribute("src", "/gambar-slider/" + imgs);
          elem.className="avatar avatar-xl pull-up";
					document.getElementById("img").appendChild(elem);
				}
			});
		}

    function sliderDel(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/get-data-slider/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
          console.log(data)
          var imgElement = $('#img-del');
					imgElement.empty();

					$('#id-del').val(data.id);
					$('#label-del').text(data.deskripsi);
					$('#oldImage-del').val(data.foto);
					$('#sliderDeleteModal').modal('show');

          var imgs_del = data.foto;
					var elem_del= document.createElement("img");
					elem_del.setAttribute("src", "/gambar-slider/" + imgs_del);
          elem_del.className="avatar avatar-xl pull-up";
					document.getElementById("img-del").appendChild(elem_del);
				}
			});
		}

    //============ ABOUT HOME FOTO ============
    function homeAboutFotoEdit(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/get-data-foto_home_about/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
					var imgElement = $('#img');
					imgElement.empty();

					$('#idEdit').val(data.id);
					$('#deskripsiEdit').val(data.deskripsi);
          $('#oldImage').val(data.foto);
          $('#homeAboutEdit').modal('show');

					var imgs = data.foto;
					var elem = document.createElement("img");
					elem.setAttribute("src", "/gambar-home-about/" + imgs);
          elem.className="avatar avatar-xl pull-up";
					document.getElementById("img").appendChild(elem);
				}
			});
		}

    function homeAboutFotoDel(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/get-data-foto_home_about/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
          console.log(data)
          var imgElement = $('#img-del');
					imgElement.empty();

					$('#id-del').val(data.id);
					$('#label-del').text(data.deskripsi);
					$('#oldImage-del').val(data.foto);
					$('#homeAboutFotoDel').modal('show');

          var imgs_del = data.foto;
					var elem_del= document.createElement("img");
					elem_del.setAttribute("src", "/gambar-home-about/" + imgs_del);
          elem_del.className="avatar avatar-xl pull-up";
					document.getElementById("img-del").appendChild(elem_del);
				}
			});
		}

    //============ URL SOSMED ============
    function urlEdit(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/get-data-url/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
          $('#id').val(data.id);
					$('#namaEdit').val(data.nama_sosmed);
          $('#urlEdit').val(data.url);
          $('#modalUrlEdit').modal('show');
				}
			});
		}

    function urlDel(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/get-data-url/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
          $('#id-del').val(data.id);
					$('#label-del').text(data.nama_sosmed);
					$('#nama-del').val(data.nama_sosmed);
					$('#modelUrlDelete').modal('show');
				}
			});
		}
    
		// KARIR
		function karirDel(element) {
			var id = $(element).attr('data-id');
			$.ajax({
				url: "/dashboard/get-data-karir/" + id,
				type: "GET",
				dataType: "JSON",
				success: function(data) {
          $('#id-del').val(data.id);
					$('#label-del').text(data.title);
					$('#karirDeleteModal').modal('show');
				}
			});
		}
  </script>
</body>
</html>
