<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\DataConfig;
use App\Models\Galeri;
use App\Models\HomeFotoAbout;
use App\Models\Karir;
use App\Models\Produk;
use App\Models\Profil;
use App\Models\Slider;
use App\Models\Url;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function dashboard()
    {
       $dataConfig = DataConfig::all();
       $homeAboutFoto = HomeFotoAbout::all();
       $aboutUs = AboutUs::all();
       $dataGaleri =  DB::table('tbl_galeri')->take(4)->get();
       $dataBlog = DB::table('tbl_berita')->take(3)->get();
       $fotoSlider = Slider::all();
        // dd($dataConfig);

        return view('frontend.pages.dashboard',[
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
        $dataConfig = DataConfig::where('id','=',1)->get();
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
        $dataAboutUs = AboutUs::all();
        $dataProfil = Profil::all();
        return view('frontend.pages.tentang-kami',[
            'dataAboutUs' => $dataAboutUs,
            'dataProfil' => $dataProfil
        ]);
    }

    public function halaman_galeri()
    {
        $dataGaleri = Galeri::all();
        return view('frontend.pages.galeri',[
            'dataGaleri' => $dataGaleri
        ]);
    }

    public function halaman_blog()
    {
        $dataBlog = Blog::all();
        $blogLimit = DB::table('tbl_berita')->take(5)->get();
        return view('frontend.pages.blog',[
            'dataBlog' => $dataBlog,
            'blogLimit' => $blogLimit
        ]);
    }

    public function halaman_blog_detail($slug)
    {
        $singleBlog = Blog::where('slug','=',$slug)->get();
        // dd($singleBlog);
        $blogLimit = DB::table('tbl_berita')->take(5)->get();
        $baseUrl="https://widayaintiplasma.com/blog/detail/";
        return view('frontend.pages.blog-detail', [
            'singleBlog' => $singleBlog,
            'blogLimit' => $blogLimit,
            'baseUrl' => $baseUrl
        ]);
    }

    public function halaman_produk()
    {
        $dataProduk = Produk::paginate(16);
        return view('frontend.pages.produk',[
            'dataProduk' => $dataProduk
        ]);
    }
    
    public function halaman_karir()
    {
        $dataKarir = Karir::all();
        return view('frontend.pages.karir',[
            'dataKarir' => $dataKarir
        ]);
    }
    
    public function halaman_produk_kid()
    {
        $produkKid = DB::table('tbl_produk')->where('tipe_produk','=','Kid')->paginate(16);
        return view('frontend.pages.produk',[
            'produkKid' => $produkKid
        ]);
    }
    
    public function halaman_produk_men()
    {
        $produkMen = DB::table('tbl_produk')->where('tipe_produk','=','Men')->paginate(16);
        return view('frontend.pages.produk',[
            'produkMen' => $produkMen
        ]);
    }
    
    public function halaman_produk_ladies()
    {
        $produkLadies = DB::table('tbl_produk')->where('tipe_produk','=','Ladies')->paginate(16);
        return view('frontend.pages.produk',[
            'produkLadies' => $produkLadies
        ]);
    }

    public function halaman_kontak()
    {
        return view('frontend.pages.kontak');
    }
}
