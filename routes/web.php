<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/my-name', function () {
    return 'Майеров Салават';
});

Route::get('/my-friend', function () {
    return 'Роденко Александр';
});

Route::get('/get-friend/{name}', function ($name) {
    return $name;
});

Route::get('/my-city/{city}', function ($city) {
    return $city;
});

Route::get('/level/{lvl}', function ($lvl) {
    if ( $lvl <=25){ echo 'Новичок';}
    elseif($lvl<=50){echo 'Специалист';}
    elseif($lvl<=75){echo 'Босс';}
    elseif($lvl<=98){echo 'Старик';}
    else{echo 'Король';}
});

Route::get('/working/{name}/{date}', function ($name,$date) {
    return $name.' '.$date;
});

Route::get('/power/{name}', function ($name){
    return \route('power',['name'=>$name]);
})->name('power');

Route::prefix('/admin')->group(function (){
    Route::get('/login',function(){
        return \route('login');
    })->name('login');
    Route::get('/logout',function(){
        return \route('logout');
    })->name('logout');
    Route::get('/info',function(){
        return \route('info');
    })->name('info');
    Route::get('/color',function(){
        return \route('info');
    })->name('info');
});

Route::redirect('/admin/web','/admin/color');

Route::get('/color/{hex}',function($hex){
    return "Цвет есть {$hex}";
})->where(['hex'=>'[0-9A-F]{6}']);
