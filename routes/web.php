<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AtualizaCadastroController;


Route::get('/', 			[HomeController::class, 'index'])->name('inicio');

Route::get('/login',  [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');

Route::get('atualizacaocadastral', [AtualizaCadastroController::class, 'index'])->name('atualizacadastro.index');
Route::post('atualizacaocadastral', [AtualizaCadastroController::class, 'store']);
Route::get('atualizacaosucesso', [AtualizaCadastroController::class, 'sucesso']);

Route::group(['middleware' => 'auth'], function () {


	Route::get('/home', 			[HomeController::class, 'home'])->name('mostra.dados');
	Route::post('logout', 			[LoginController::class, 'logout'])->name('logout');

	Route::get('/register', 		[RegisterController::class, 'create'])->name('register');
	Route::post('/register', 		[RegisterController::class, 'store'])->name('register.perform');

	Route::get ('/alterasenha',		[UserController::class, 'AlteraSenha']);
	Route::post('/salvasenha',   	[UserController::class, 'SalvarSenha']);

	Route::resources([
		'user'		  => UserController::class,
	]);
});
