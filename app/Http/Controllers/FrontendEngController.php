<?php

namespace App\Http\Controllers;

use App\Models\AboutUsEn;
use App\Models\BlogEn;
use App\Models\DataConfigEn;
use App\Models\Galeri;
use App\Models\HomeFotoAbout;
use App\Models\Karir;
use App\Models\Produk;
use App\Models\ProfilEn;
use App\Models\Slider;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendEngController extends Controller
{
    public function dashboard()
    {
       $dataConfig = DataConfigEn::all();
       $homeAboutFoto = HomeFotoAbout::all();
       $aboutUs = AboutUsEn::all();
       $dataGaleri =  DB::table('tbl_galeri')->take(4)->get();
       $dataBlog = DB::table('tbl_berita_en')->take(3)->get();
       $fotoSlider = Slider::all();
        // dd($dataConfig);

        return view('frontend.pages.en.dashboard',[
            'dataConfig' => $dataConfig,
            'homeAboutFoto' => $homeAboutFoto,
            'aboutUs' => $aboutUs,
            'dataGaleri' => $dataGaleri,
            'dataBlog' => $dataBlog,
            'fotoSlider' => $fotoSlider
            ]
        );
    }

    public function config_data()
    {
        $dataConfig = DataConfigEn::where('id','=',1)->get();
        // dd($dataConfig);
        return response()->json($dataConfig);
    }
    
    public function config_data_sosmed()
    {
        $dataSosmed = Url::all();
        return response()->json([
           'dataSosmed' => $dataSosmed
        ]);
    }

    public function halaman_tentang_kami()
    {
        $dataAboutUs = AboutUsEn::all();
        $dataProfil = ProfilEn::all();
        return view('frontend.pages.en.tentang-kami',[
            'dataAboutUs' => $dataAboutUs,
            'dataProfil' => $dataProfil
        ]);
    }

    public function halaman_galeri()
    {
        $dataGaleri = Galeri::all();
        return view('frontend.pages.en.galeri',[
            'dataGaleri' => $dataGaleri
        ]);
    }

    public function halaman_blog()
    {
        $dataBlog = BlogEn::all();
        $blogLimit = DB::table('tbl_berita_en')->take(5)->get();
        return view('frontend.pages.en.blog',[
            'dataBlog' => $dataBlog,
            'blogLimit' => $blogLimit
        ]);
    }

    public function halaman_blog_detail($slug)
    {
        $singleBlog = BlogEn::where('slug','=',$slug)->get();
        // dd($singleBlog);
        $blogLimit = DB::table('tbl_berita_en')->take(5)->get();
        $baseUrl="https://widayaintiplasma.com/blog/detail/";
        return view('frontend.pages.en.blog-detail', [
            'singleBlog' => $singleBlog,
            'blogLimit' => $blogLimit,
            'baseUrl' => $baseUrl
        ]);
    }

    public function halaman_produk()
    {
        $dataProduk = Produk::paginate(16);
        return view('frontend.pages.en.produk',[
            'dataProduk' => $dataProduk
        ]);
    }
    
    public function halaman_karir()
    {
        $dataKarir = Karir::all();
        return view('frontend.pages.en.karir',[
            'dataKarir' => $dataKarir
        ]);
    }
    
    public function halaman_produk_kid()
    {
        $produkKid = DB::table('tbl_produk')->where('tipe_produk','=','Kid')->paginate(16);
        return view('frontend.pages.en.produk',[
            'produkKid' => $produkKid
        ]);
    }
    
    public function halaman_produk_men()
    {
        $produkMen = DB::table('tbl_produk')->where('tipe_produk','=','Men')->paginate(16);
        return view('frontend.pages.en.produk',[
            'produkMen' => $produkMen
        ]);
    }
    
    public function halaman_produk_ladies()
    {
        $produkLadies = DB::table('tbl_produk')->where('tipe_produk','=','Ladies')->paginate(16);
        return view('frontend.pages.en.produk',[
            'produkLadies' => $produkLadies
        ]);
    }

    public function halaman_kontak()
    {
        return view('frontend.pages.en.kontak');
    }
}
