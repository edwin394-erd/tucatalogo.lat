<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;

use App\Livewire\Login;
use App\Livewire\Register;


use App\Livewire\Dashboard;
use App\Livewire\Products;
use App\Livewire\Categories;
use App\Livewire\Descuentos;
use App\Livewire\Configuracion;
use App\Livewire\Catalogo;
use App\Livewire\ShowProduct;




use App\Livewire\EditItem;
use App\Livewire\CreateItem;



Route::get('/', Home::class)->middleware(['guest'])->name('home');
Route::get('/Login', Login::class)->middleware(['guest'])->name('login');
Route::get('/Register', Register::class)->middleware(['guest'])->name('register');

Route::get('/Dashboard', Dashboard::class)->middleware(['auth'])->name('dashboard');
Route::get('/Products', Products::class)->middleware(['auth'])->name('products');
Route::get('/Categories', Categories::class)->middleware(['auth'])->name('categories');
Route::get('/Descuentos', Descuentos::class)->middleware(['auth'])->name('descuentos');
Route::get('/Configuracion', Configuracion::class)->middleware(['auth'])->name('configuracion');

Route::get('/{name}/product/{id}', ShowProduct::class)->name('product-show');

Route::get('/{name}', Catalogo::class)->name('catalogo');

Route::get('/Editar/{model}/{id}', EditItem::class)->middleware(['auth'])->name('edit');
Route::get('/Crear/{model}', CreateItem::class)->middleware(['auth'])->name('create');



