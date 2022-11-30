<?php

use App\Http\Controllers\BackendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'dashboard']);
Route::get('/tentang-kami', [FrontendController::class, 'halaman_tentang_kami']);
Route::get('/galeri', [FrontendController::class, 'halaman_galeri']);
Route::get('/blog', [FrontendController::class, 'halaman_blog']);
Route::get('/blog/detail/{slug}', [FrontendController::class, 'halaman_blog_detail']);
Route::get('/kontak', [FrontendController::class, 'halaman_kontak']);
Route::get('/produk', [FrontendController::class, 'halaman_produk']);
Route::get('/karir', [FrontendController::class, 'halaman_karir']);
Route::get('/produk/kid', [FrontendController::class, 'halaman_produk_kid']);
Route::get('/produk/men', [FrontendController::class, 'halaman_produk_men']);
Route::get('/produk/ladies', [FrontendController::class, 'halaman_produk_ladies']);
Route::get('/get-data-config', [FrontendController::class, 'config_data']);
Route::get('/get-data-sosmed', [FrontendController::class, 'config_data_sosmed']);

//PANEL ADMIN
Route::get('/panel', [LoginController::class, 'login_admin'])->name('login')->middleware('guest');
Route::post('/panel', [LoginController::class, 'authenticate_admin']);
Route::get('/dashboard/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
  Route::get('/dashboard',[BackendController::class, 'dashboard_admin']);

  Route::get('/dashboard/produk',[BackendController::class, 'produk_admin']);
  Route::post('/dashboard/produk-tambah',[BackendController::class, 'produk_admin_tambah']);
  Route::get('dashboard/get-data-produk/{id}', [BackendController::class, 'get_data_produk']);
  Route::patch('/dashboard/produk-edit', [BackendController::class, 'produk_admin_edit']);
  Route::delete('/dashboard/produk-delete', [BackendController::class, 'produk_admin_delete']);

  Route::get('/dashboard/blog',[BackendController::class, 'blog_admin']);
  Route::post('/dashboard/blog-tambah',[BackendController::class, 'blog_admin_tambah']);
  Route::get('/dashboard/get-data-blog/{id}', [BackendController::class, 'get_data_blog']);
  Route::get('/dashboard/blog/detail/{id}', [BackendController::class, 'blog_admin_detail']);
  Route::patch('/dashboard/blog-edit', [BackendController::class, 'blog_admin_edit']);
  Route::delete('/dashboard/blog-delete', [BackendController::class, 'blog_admin_delete']);

  Route::get('/dashboard/galeri',[BackendController::class, 'galeri_admin']);
  Route::post('/dashboard/galeri-tambah',[BackendController::class, 'galeri_admin_tambah']);
  Route::get('/dashboard/get-data-galeri/{id}', [BackendController::class, 'get_data_galeri']);
  Route::patch('/dashboard/galeri-edit', [BackendController::class, 'galeri_admin_edit']);
  Route::delete('/dashboard/galeri-delete', [BackendController::class, 'galeri_admin_delete']);

  Route::get('/dashboard/pengguna',[BackendController::class, 'pengguna_admin']);
  Route::post('/dashboard/pengguna-tambah',[BackendController::class, 'pengguna_admin_tambah']);
  Route::get('/dashboard/get-data-pengguna/{id}', [BackendController::class, 'get_data_pengguna']);
  Route::patch('/dashboard/pengguna-edit', [BackendController::class, 'pengguna_admin_edit']);
  Route::delete('/dashboard/pengguna-delete', [BackendController::class, 'pengguna_admin_delete']);


  // PENGATURAN
  Route::get('/dashboard/setting-foto-slider',[BackendController::class, 'foto_slider_admin']);
  Route::post('/dashboard/setting-foto-slider-tambah',[BackendController::class, 'foto_slider_admin_tambah']);
  Route::get('/dashboard/get-data-slider/{id}', [BackendController::class, 'get_data_slider']);
  Route::patch('/dashboard/setting-foto-slider-edit', [BackendController::class, 'foto_slider_admin_edit']);
  Route::delete('/dashboard/setting-foto-slider-delete', [BackendController::class, 'foto_slider_admin_delete']);

  Route::get('/dashboard/setting-foto-about',[BackendController::class, 'foto_about_admin']);
  Route::post('/dashboard/setting-foto-about-tambah',[BackendController::class, 'foto_about_admin_tambah']);
  Route::get('/dashboard/get-data-foto_home_about/{id}', [BackendController::class, 'get_data_home_about_foto']);
  Route::patch('/dashboard/setting-foto-about-edit', [BackendController::class, 'foto_about_admin_edit']);
  Route::delete('/dashboard/setting-foto-about-delete', [BackendController::class, 'foto_about_admin_delete']);

  Route::get('/dashboard/setting-about-us',[BackendController::class, 'about_us_admin']);
  Route::post('/dashboard/setting-about-us-tambah',[BackendController::class, 'about_us_admin_tambah']);
  Route::get('/dashboard/setting-about-us/detail/{id}', [BackendController::class, 'about_us_admin_detail']);
  Route::patch('/dashboard/setting-about-us-edit', [BackendController::class, 'about_us_admin_edit']);
  Route::delete('/dashboard/setting-about-us-delete', [BackendController::class, 'about_us_admin_delete']);

  Route::get('/dashboard/setting-profile',[BackendController::class, 'profile_admin']);
  Route::patch('/dashboard/setting-profile-edit', [BackendController::class, 'profile_admin_edit']);
  
  Route::get('/dashboard/setting-url-sosmed',[BackendController::class, 'url_sosmed_admin']);
  Route::post('/dashboard/setting-url-sosmed-tambah',[BackendController::class, 'url_sosmed_admin_tambah']);
  Route::get('/dashboard/get-data-url/{id}', [BackendController::class, 'get_data_url']);
  Route::patch('/dashboard/setting-url-sosmed-edit', [BackendController::class, 'url_sosmed_admin_edit']);
  Route::delete('/dashboard/setting-url-sosmed-delete', [BackendController::class, 'url_sosmed_admin_delete']);
  
  Route::get('/dashboard/akun-saya/{username}',[BackendController::class, 'akun_saya']);
  Route::patch('/dashboard/akun-saya/edit', [BackendController::class, 'data_akun_edit']);

  Route::get('/dashboard/karir',[BackendController::class, 'karir_admin']);
  Route::post('/dashboard/karir-tambah',[BackendController::class, 'karir_admin_tambah']);
  Route::get('/dashboard/karir/detail/{id}', [BackendController::class, 'karir_admin_detail']);
  Route::get('/dashboard/get-data-karir/{id}', [BackendController::class, 'get_data_karir']);
  Route::patch('/dashboard/karir-edit', [BackendController::class, 'karir_admin_edit']);
  Route::delete('/dashboard/karir-delete', [BackendController::class, 'karir_admin_delete']);
  
  Route::get('/total-produk',[BackendController::class, 'cek_total_produk']);
  Route::get('/total-user',[BackendController::class, 'cek_total_user']);
  Route::get('/total-galeri',[BackendController::class, 'cek_total_galeri']);
  Route::get('/total-slider',[BackendController::class, 'cek_total_slider']);
  Route::get('/total-blog',[BackendController::class, 'cek_total_blog']);
  Route::get('/total-sosmed',[BackendController::class, 'cek_total_sosmed']);
});