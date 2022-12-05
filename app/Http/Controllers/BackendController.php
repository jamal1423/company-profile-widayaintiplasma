<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\AboutUsEn;
use App\Models\Blog;
use App\Models\BlogEn;
use App\Models\Galeri;
use App\Models\HomeFotoAbout;
use App\Models\Karir;
use App\Models\Produk;
use App\Models\Profil;
use App\Models\ProfilEn;
use App\Models\Slider;
use App\Models\Url;
use App\Models\User;
use Illuminate\Http\Request;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use Symfony\Component\HttpKernel\Profiler\Profile;

class BackendController extends Controller
{
    public function dashboard_admin()
    {
        return view('backend.pages.dashboard');
    }

    public function produk_admin()
    {
        try {
            // $dataProduk = Produk::all();
            $dataProduk = Produk::paginate(10);
            // $dataProduk = DB::table('tbl_produk')->paginate(10);
            return view('backend.pages.produk',[
            'dataProduk' => $dataProduk,
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/produk')->with('produk-error', 'Error, Ulangi proses!');
        }
    }

    public function produk_admin_tambah(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'artikel' => 'required|max:255',
                'jenis_produk' => 'required',
                'tipe_produk' => 'required',
                'foto' => 'required',
            ]);

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/gambar-produk/', $name);
                $validatedData['foto'] = $name;
            }

            // $validatedData['userlog'] = auth()->user()->username;
            $validatedData['userlog'] = 'jamal';

            Produk::create($validatedData);
            return redirect('/dashboard/produk')->with('produk-tambah', 'Produk baru berhasil ditambahkan!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/produk')->with('produk-error', 'Error, Ulangi proses!');
        }
    }

    public function produk_admin_edit(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'artikel' => '',
                'jenis_produk' => '',
                'tipe_produk' => '',
                'foto' => '',
            ]);

            if ($request->hasFile('foto')) {
                if ($request->oldImage) {
                    $gmbr = $request->oldImage;
                    $image_path = public_path() . '/gambar-produk/' . $gmbr;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image = $request->file('foto');
                $name = date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/gambar-produk/', $name);
                $validatedData['foto'] = $name;
            }
            $validatedData['userlog'] = 'jamal';

            Produk::where('id', $request->id)
                ->update($validatedData);
            return redirect('/dashboard/produk')->with('produk-edit', 'Produk berhasil diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/produk')->with('produk-error', 'Error, Ulangi proses!');
        }
    }

    public function produk_admin_delete(Request $request)
    {
        try {
            $gmbr = $request->oldImage_del;
            $image_path = public_path() . '/gambar-produk/' . $gmbr;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            Produk::destroy($request->id_del);
            return redirect('/dashboard/produk')->with('produk-delete', 'Produk berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/produk')->with('produk-error', 'Error, silahkan ulangi proses!');
        }
    }

    public function get_data_produk($id)
    {
        $produkData = Produk::findOrFail($id);
        return response()->json($produkData);
    }
    
    // DATA BLOG / BERITA
    public function blog_admin()
    {
        try {
            $dataBlog = Blog::paginate(10);
            $dataBlogEn = BlogEn::paginate(10);
            return view('backend.pages.blog',[
            'dataBlog' => $dataBlog,
            'dataBlogEn' => $dataBlogEn
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/blog')->with('blog-error', 'Error, Ulangi proses!');
        }
    }

    public function blog_admin_tambah(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'slug' => '',
                'deskripsi' => 'required',
                'foto' => 'required',
            ]);

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                if($request->bahasa == "id")
                {
                    $name = "img-id-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                }
                else
                {
                    $name = "img-en-".date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                }
                $image->move(public_path() . '/gambar-blog/', $name);
                $validatedData['foto'] = $name;
            }

            $validatedData['tglBerita'] = Carbon::now();
            $validatedData['userlog'] = auth()->user()->username;

            if($request->bahasa == "id")
            {
                $validatedData['slug'] = SlugService::createSlug(Blog::class, 'slug', $request->title);
                Blog::create($validatedData);
            }
            else
            {
                $validatedData['slug'] = SlugService::createSlug(BlogEn::class, 'slug', $request->title);
                BlogEn::create($validatedData);
            }

            return redirect('/dashboard/blog')->with('blog-tambah', 'Blog baru berhasil ditambahkan!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/blog')->with('blog-error', 'Error, Ulangi proses!');
        }
    }

    public function get_data_blog($id,$bahasa)
    {
        if($bahasa == "id")
        {
            $blogData = Blog::findOrFail($id);
        }
        else
        {
            $blogData = BlogEn::findOrFail($id);
        }
        
        return response()->json($blogData);
    }
    
    public function get_data_blog_en($id)
    {
        $blogDataEn = BlogEn::findOrFail($id);
        return response()->json($blogDataEn);
    }

    public function blog_admin_edit(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => '',
                'slug' => '',
                'deskripsi' => '',
                'foto' => '',
            ]);

            if ($request->hasFile('foto')) {
                if ($request->oldImage) {
                    $gmbr = $request->oldImage;
                    $image_path = public_path() . '/gambar-blog/' . $gmbr;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image = $request->file('foto');
                $name = date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/gambar-blog/', $name);
                $validatedData['foto'] = $name;
            }

            $validatedData['tglBerita'] = Carbon::now();
            $validatedData['userlog'] = auth()->user()->username;

            if($request->bahasa == "id")
            {
                if ($request->oldTitle != $request->title) {
                    $validatedData['slug'] = SlugService::createSlug(Blog::class, 'slug', $request->title);
                }
    
                Blog::where('id', $request->id)
                ->update($validatedData);
            }
            else
            {
                if ($request->oldTitle != $request->title) {
                    $validatedData['slug'] = SlugService::createSlug(BlogEn::class, 'slug', $request->title);
                }
    
                BlogEn::where('id', $request->id)
                ->update($validatedData);
            }
            return redirect('/dashboard/blog/detail/'.base64_encode($request->id).'/'.base64_encode($request->bahasa))->with('blog-edit', 'Blog berhasil diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/blog/detail/'.base64_encode($request->id).'/'.base64_encode($request->bahasa))->with('blog-error', 'Error, Ulangi proses!');
        }
    }

    public function blog_admin_detail($id, $bahasa)
    {
        $getID = base64_decode($id);
        $getBahasa = base64_decode($bahasa);
        if($getBahasa == "id")
        {
            $blogs = Blog::findOrFail($getID);
        }
        else
        {
            $blogs = BlogEn::findOrFail($getID);
        }
        
        return view('backend.pages.blog-detail', [
            'blogs' => $blogs,
            'getBahasa' => $getBahasa
        ]);
    }
    
    public function blog_admin_delete(Request $request)
    {
        try {
            $gmbr = $request->oldImage_del;
            $image_path = public_path() . '/gambar-blog/' . $gmbr;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            if($request->bahasa == "id")
            {
                Blog::destroy($request->id_del);
            }
            else
            {
                BlogEn::destroy($request->id_del);
            }
            return redirect('/dashboard/blog')->with('blog-delete', 'Blog berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/blog')->with('blog-error', 'Error, silahkan ulangi proses!');
        }
    }
    
    public function galeri_admin()
    {
        $dataGaleri = Galeri::paginate(10);
        return view('backend.pages.galeri',[
            'dataGaleri' => $dataGaleri
        ]);
    }

    public function get_data_galeri($id)
    {
        $dataGaleri = Galeri::findOrFail($id);
        return response()->json($dataGaleri);
    }

    public function galeri_admin_tambah(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'judul' => 'required|max:255',
                'deskripsi' => 'required',
                'foto' => 'required',
            ]);

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/gambar-galeri/', $name);
                $validatedData['foto'] = $name;
            }

            // $validatedData['userlog'] = auth()->user()->username;
            $validatedData['userlog'] = 'jamal';

            Galeri::create($validatedData);
            return redirect('/dashboard/galeri')->with('galeri-tambah', 'Gambar baru berhasil ditambahkan!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/galeri')->with('galeri-error', 'Error, Ulangi proses!');
        }
    }

    public function galeri_admin_edit(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'judul' => '',
                'deskripsi' => '',
                'foto' => '',
            ]);

            if ($request->hasFile('foto')) {
                if ($request->oldImage) {
                    $gmbr = $request->oldImage;
                    $image_path = public_path() . '/gambar-galeri/' . $gmbr;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image = $request->file('foto');
                $name = date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/gambar-galeri/', $name);
                $validatedData['foto'] = $name;
            }

            $validatedData['userlog'] = 'jamal';

            Galeri::where('id', $request->id)
                ->update($validatedData);
            return redirect('/dashboard/galeri')->with('galeri-edit', 'Foto galeri berhasil diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/galeri')->with('galeri-error', 'Error, Ulangi proses!');
        }
    }

    public function galeri_admin_delete(Request $request)
    {
        try {
            $gmbr = $request->oldImage_del;
            $image_path = public_path() . '/gambar-galeri/' . $gmbr;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            Galeri::destroy($request->id_del);
            return redirect('/dashboard/galeri')->with('galeri-delete', 'Foto Galeri berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/galeri')->with('galeri-error', 'Error, silahkan ulangi proses!');
        }
    }
    
    public function pengguna_admin()
    {
        if(auth()->user()->hak_akses == 'Administrator')
        {
            $dataUser = User::paginate(10);
            return view('backend.pages.pengguna',[
                'dataUser' => $dataUser
            ]);
        }
        else
        {
            return redirect('/dashboard');
        }
    }

    public function pengguna_admin_tambah(Request $request)
    {
        if(auth()->user()->hak_akses == 'Administrator')
        {
            try {
                $validatedData = $request->validate([
                    'username' => 'required',
                    'nama' => 'required',
                    'password' => ['required', 'min:6', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/'],
                    'hak_akses' => 'required'
                ]);
    
                // dd($validatedData);
                
                $validatedData['password'] = bcrypt($validatedData['password']);
    
                User::create($validatedData);
                return redirect('/dashboard/pengguna')->with('pengguna-tambah', 'User baru berhasil ditambahkan!');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect('/dashboard/pengguna')->with('pengguna-error', 'Error, Ulangi proses!');
            }
        }
        else
        {
            return redirect('/dashboard');
        }
    }

    public function pengguna_admin_edit(Request $request)
    {
        if(auth()->user()->hak_akses == 'Administrator')
        {
            try {
                $validatedData = $request->validate([
                    'username' => '',
                    'nama' => '',
                    'hak_akses' => ''
                ]);
    
                if ($request->password != '') {
                    // $validatedData = $request->validate([
                    //     'password' => ['required', 'min:6', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/']
                    // ]);
                    $validatedData['password'] = bcrypt($validatedData['password']);
                }
    
                User::where('id', $request->id)
                    ->update($validatedData);
                return redirect('/dashboard/pengguna')->with('pengguna-edit', 'Pengguna berhasil diubah!');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect('/dashboard/pengguna')->with('pengguna-error', 'Error, Ulangi proses!');
            }
        }
        else
        {
            return redirect('/dashboard');
        }
    }

    public function get_data_pengguna($id)
    {
        if(auth()->user()->hak_akses == 'Administrator')
        {
            $userData = User::findOrFail($id);
            return response()->json($userData);
        }
        else
        {
            return redirect('/dashboard');
        }
    }

    public function pengguna_admin_delete(Request $request)
    {
        if(auth()->user()->hak_akses == 'Administrator')
        {
            try {
                User::destroy($request->id_del);
                return redirect('/dashboard/pengguna')->with('pengguna-delete', 'Pengguna berhasil dihapus');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect('/dashboard/pengguna')->with('pengguna-error', 'Error, silahkan ulangi proses!');
            }
        }
        else
        {
            return redirect('/dashboard');
        }
    }
    
    public function foto_slider_admin()
    {
        $dataSlider = Slider::paginate(10);
        return view('backend.pages.home-slider',[
            'dataSlider' => $dataSlider
        ]);
    }

    public function get_data_slider($id)
    {
        $dataSlider = Slider::findOrFail($id);
        return response()->json($dataSlider);
    }

    public function foto_slider_admin_tambah(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'deskripsi' => 'required',
                'foto' => 'required',
            ]);

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/gambar-slider/', $name);
                $validatedData['foto'] = $name;
            }

            Slider::create($validatedData);
            return redirect('/dashboard/setting-foto-slider')->with('slider-tambah', 'Slider baru berhasil ditambahkan!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/setting-foto-slider')->with('slider-error', 'Error, Ulangi proses!');
        }
    }

    public function foto_slider_admin_edit(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'deskripsi' => '',
                'foto' => '',
            ]);

            if ($request->hasFile('foto')) {
                if ($request->oldImage) {
                    $gmbr = $request->oldImage;
                    $image_path = public_path() . '/gambar-slider/' . $gmbr;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image = $request->file('foto');
                $name = date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/gambar-slider/', $name);
                $validatedData['foto'] = $name;
            }

            Slider::where('id', $request->id)
                ->update($validatedData);
            return redirect('/dashboard/setting-foto-slider')->with('slider-edit', 'Slider berhasil diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/setting-foto-slider')->with('slider-error', 'Error, Ulangi proses!');
        }
    }

    public function foto_slider_admin_delete(Request $request)
    {
        try {
            $gmbr = $request->oldImage_del;
            $image_path = public_path() . '/gambar-slider/' . $gmbr;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            Slider::destroy($request->id_del);
            return redirect('/dashboard/setting-foto-slider')->with('slider-delete', 'Slider berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/setting-foto-slider')->with('slider-error', 'Error, silahkan ulangi proses!');
        }
    }
    
    public function foto_about_admin()
    {
        $dataFotoHomeAbout = HomeFotoAbout::paginate(10);
        return view('backend.pages.home-about',[
            'dataFotoHomeAbout' => $dataFotoHomeAbout
        ]);
    }

    public function foto_about_admin_tambah(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'deskripsi' => 'required',
                'foto' => 'required',
            ]);

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $name = date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/gambar-home-about/', $name);
                $validatedData['foto'] = $name;
            }

            HomeFotoAbout::create($validatedData);
            return redirect('/dashboard/setting-foto-about')->with('about-home-tambah', 'Foto about home berhasil ditambahkan!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/setting-foto-about')->with('about-home-error', 'Error, Ulangi proses!');
        }
    }

    public function get_data_home_about_foto($id)
    {
        $dataHomeAbout = HomeFotoAbout::findOrFail($id);
        return response()->json($dataHomeAbout);
    }

    public function foto_about_admin_edit(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'deskripsi' => '',
                'foto' => '',
            ]);

            if ($request->hasFile('foto')) {
                if ($request->oldImage) {
                    $gmbr = $request->oldImage;
                    $image_path = public_path() . '/gambar-home-about/' . $gmbr;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $image = $request->file('foto');
                $name = date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                $image->move(public_path() . '/gambar-home-about/', $name);
                $validatedData['foto'] = $name;
            }

            HomeFotoAbout::where('id', $request->id)
                ->update($validatedData);
            return redirect('/dashboard/setting-foto-about')->with('about-home-edit', 'Foto about berhasil diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/setting-foto-about')->with('about-home-error', 'Error, Ulangi proses!');
        }
    }

    public function foto_about_admin_delete(Request $request)
    {
        try {
            $gmbr = $request->oldImage_del;
            $image_path = public_path() . '/gambar-home-about/' . $gmbr;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            HomeFotoAbout::destroy($request->id_del);
            return redirect('/dashboard/setting-foto-about')->with('about-home-delete', 'Foto about home berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/setting-foto-about')->with('about-home-error', 'Error, silahkan ulangi proses!');
        }
    }
    
    public function about_us_admin()
    {   
        try{
            if(auth()->user()->hak_akses == 'Administrator' || auth()->user()->hak_akses == 'Mrkt')
            {
                $aboutUs = AboutUs::all();
                $aboutUsEn = AboutUsEn::all();

                return view('backend.pages.about-us',[
                    'aboutUs' => $aboutUs,
                    'aboutUsEn' => $aboutUsEn
                ]);
            }
            else
            {
                return redirect('/dashboard');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/setting-about-us')->with('about-us-error', 'Error, Ulangi proses!');
        }
    }

    public function about_us_admin_detail($id,$bahasa)
    {
        if(auth()->user()->hak_akses == 'Administrator' || auth()->user()->hak_akses == 'Mrkt')
        {
            $getBahasa = base64_decode($bahasa);
            $getID = base64_decode($id);
            if($getBahasa == "id")
            {
                $aboutUs = AboutUs::findOrFail($getID);
            }
            else
            {
                $aboutUs = AboutUsEn::findOrFail($getID);
            }
            
            return view('backend.pages.about-us-detail', [
                'aboutUs' => $aboutUs,
                'getBahasa' => $getBahasa
            ]);
        }
        else
        {
            return redirect('/dashboard');
        }
    }

    public function about_us_admin_edit(Request $request)
    {
        if(auth()->user()->hak_akses == 'Administrator' || auth()->user()->hak_akses == 'Mrkt')
        {
            try {
                $validatedData = $request->validate([
                    'deskripsi' => '',
                    'visi' => '',
                    'misi' => '',
                    'foto' => '',
                ]);

                if ($request->hasFile('foto')) {
                    if ($request->oldImage) {
                        $gmbr = $request->oldImage;
                        $image_path = public_path() . '/gambar-about-us/' . $gmbr;
                        if (File::exists($image_path)) {
                            File::delete($image_path);
                        }
                    }

                    $image = $request->file('foto');
                    $name = date('mdYHis') .'-'. uniqid() .'-'. $image->getClientOriginalName();
                    $image->move(public_path() . '/gambar-about-us/', $name);
                    $validatedData['foto'] = $name;
                }

                if($request->bahasa == "id")
                {
                    AboutUs::where('id', $request->id)
                    ->update($validatedData);
                }
                else
                {
                    AboutUsEn::where('id', $request->id)
                    ->update($validatedData);
                }

                return redirect('/dashboard/setting-about-us/detail/'.base64_encode($request->id).'/'.base64_encode($request->bahasa))->with('about-us-edit', 'About-Us berhasil diubah!');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect('/dashboard/setting-about-us/detail/'.base64_encode($request->id).'/'.base64_encode($request->bahasa))->with('about-us-error', 'Error, Ulangi proses!');
            }
        }
        else
        {
            return redirect('/dashboard');
        }
    }
    
    public function profile_admin()
    {
        try{
            if(auth()->user()->hak_akses == 'Administrator' || auth()->user()->hak_akses == 'Mrkt')
            {
                $dataProfil = Profil::all();
                $dataProfilEn = ProfilEn::all();
                return view('backend.pages.profile',[
                    'dataProfil' => $dataProfil,
                    'dataProfilEn' => $dataProfilEn
                ]);
            }
            else
            {
                return redirect('/dashboard');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/setting-profile')->with('profil-error', 'Error, Ulangi proses!');
        }
    }
    
    public function profile_admin_edit(Request $request)
    {
        if(auth()->user()->hak_akses == 'Administrator' || auth()->user()->hak_akses == 'Mrkt')
        {
            try {
                $validatedData = $request->validate([
                    'nama_perusahaan' => '',
                    'lokasi' => '',
                    'kodepos' => '',
                    'provinsi' => '',
                    'negara' => '',
                    'telp' => '',
                    'fax' => '',
                    'website' => '',
                    'email' => '',
                    'kontak' => '',
                    'tahun_didirikan' => '',
                    'sektor_bisnis' => '',
                    'bahasa' => '',
                    'produk_utama' => '',
                    'merek' => '',
                    'volume' => '',
                    'spesifikasi' => '',
                    'komposisi_bahan' => '',
                    'harga_jangka' => '',
                    'minimum_order' => '',
                    'validitas_harga' => '',
                    'proses_manufaktur' => '',
                    'tenaga_kerja' => '',
                    'pendapatan_ekspor' => '',
                    'tujuan_ekspor' => '',
                    'jns_bisnis_lain' => '',
                ]);

                if($request->bahasaDefault == "id")
                {
                    Profil::where('id', $request->id)
                    ->update($validatedData);
                }
                else
                {
                    ProfilEn::where('id', $request->id)
                    ->update($validatedData);
                }
                return redirect('/dashboard/setting-profile')->with('profil-edit', 'Profil berhasil diubah!');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect('/dashboard/setting-profile')->with('profil-error', 'Error, Ulangi proses!');
            }
        }
        else
        {
            return redirect('/dashboard');
        }
    }

    public function akun_saya($username)
    {
        $getUser = base64_decode($username);
        $dataUser = User::where('username','=',$getUser)->get();
        return view('backend.pages.akun',[
            'dataUser' => $dataUser
        ]);
    }

    public function url_sosmed_admin()
    {
        $dataUrl = Url::paginate(10);
        return view('backend.pages.url-sosmed',[
            'dataUrl' => $dataUrl
        ]);
    }

    public function url_sosmed_admin_tambah(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_sosmed' => 'required',
                'url' => 'required'
            ]);
            
            $validatedData['userlog'] = 'jamal';

            Url::create($validatedData);
            return redirect('/dashboard/setting-url-sosmed')->with('url-tambah', 'Url baru berhasil ditambahkan!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/setting-url-sosmed')->with('url-error', 'Error, Ulangi proses!');
        }
    }

    public function url_sosmed_admin_edit(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama_sosmed' => '',
                'url' => '',
            ]);

            $validatedData['userlog'] = 'jamal';

            Url::where('id', $request->id)
                ->update($validatedData);
            return redirect('/dashboard/setting-url-sosmed')->with('url-edit', 'Url berhasil diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/setting-url-sosmed')->with('url-error', 'Error, Ulangi proses!');
        }
    }

    public function get_data_url($id)
    {
        $dataUrl = Url::findOrFail($id);
        return response()->json($dataUrl);
    }

    public function url_sosmed_admin_delete(Request $request)
    {
        try {
            Url::destroy($request->id_del);
            return redirect('/dashboard/setting-url-sosmed')->with('url-delete', 'Url berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/setting-url-sosmed')->with('url-error', 'Error, silahkan ulangi proses!');
        }
    }

    public function cek_total_produk()
    {
        try {
            $produkTotal = Produk::count();
            // dd($produkTotal);
            return response()->json($produkTotal);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard')->with('url-error', 'Error, silahkan ulangi proses!');
        }
    }
    
    public function cek_total_user()
    {
        try {
            $userTotal = User::count();
            return response()->json($userTotal);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard')->with('url-error', 'Error, silahkan ulangi proses!');
        }
    }
    
    public function cek_total_galeri()
    {
        try {
            $galeriTotal = Galeri::count();
            return response()->json($galeriTotal);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard')->with('url-error', 'Error, silahkan ulangi proses!');
        }
    }
    
    public function cek_total_slider()
    {
        try {
            $sliderTotal = Slider::count();
            return response()->json($sliderTotal);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard')->with('url-error', 'Error, silahkan ulangi proses!');
        }
    }
    
    public function cek_total_blog()
    {
        try {
            $blogTotal = Blog::count();
            return response()->json($blogTotal);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard')->with('url-error', 'Error, silahkan ulangi proses!');
        }
    }
    
    public function cek_total_sosmed()
    {
        try {
            $sosmedTotal = Url::count();
            return response()->json($sosmedTotal);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard')->with('url-error', 'Error, silahkan ulangi proses!');
        }
    }

    public function data_akun_edit(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'username' => '',
                'nama' => '',
                'password' => '',
                'hak_akses' => ''
            ]);

            if ($request->password != '') {
                $validatedData = $request->validate([
                    'password' => ['required', 'min:6', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/']
                ]);
                $validatedData['password'] = bcrypt($validatedData['password']);
            }

            User::where('id', $request->id)
                ->update($validatedData);
            return redirect('/dashboard/akun-saya/'.base64_encode(auth()->user()->username))->with('akun-edit', 'Data berhasil diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/akun-saya/'.base64_encode(auth()->user()->username))->with('akun-error', 'Error, Ulangi proses!');
        }
    }

     // KARIR
    public function karir_admin()
    {
        try {
            $dataKarir = Karir::paginate(10);
            return view('backend.pages.karir',[
            'dataKarir' => $dataKarir,
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/karir')->with('karir-error', 'Error, Ulangi proses!');
        }
    }

    public function karir_admin_tambah(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'deskripsi' => 'required',
            ]);

            Karir::create($validatedData);
            return redirect('/dashboard/karir')->with('karir-tambah', 'Data loker baru berhasil ditambahkan!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/karir')->with('karir-error', 'Error, Ulangi proses!');
        }
    }
 
    public function karir_admin_edit(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => '',
                'deskripsi' => '',
            ]);

            Karir::where('id', $request->id)
                ->update($validatedData);
            return redirect('/dashboard/karir/detail/'.base64_encode($request->id))->with('karir-edit', 'Data loker berhasil diubah!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/karir/detail/'.base64_encode($request->id))->with('karir-error', 'Error, Ulangi proses!');
        }
    }
 
    public function karir_admin_detail($id)
    {
        $getID = base64_decode($id);
        $detailKarir = Karir::findOrFail($getID);
        return view('backend.pages.karir-detail', [
            'detailKarir' => $detailKarir
        ]);
    }

    public function get_data_karir($id)
    {
        $dataKarir = Karir::findOrFail($id);
        return response()->json($dataKarir);
    }
 
    public function karir_admin_delete(Request $request)
    {
        try {
            Karir::destroy($request->id_del);
            return redirect('/dashboard/karir')->with('karir-delete', 'Data loker berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/dashboard/karir')->with('karir-error', 'Error, silahkan ulangi proses!');
        }
    }
}
