<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', function () {
    return view('accueil');
})->name('accueil');

Route::get('/commande', function () {
    return view('commande');
})->name('commande');

Route::get('/livreur', function () {
    return view('livreur');
})->name('livreur');

Route::get('/notification', function () {
    return view('notification');
})->name('notification');
