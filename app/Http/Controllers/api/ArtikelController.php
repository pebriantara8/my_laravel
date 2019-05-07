<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

use App\Artikel;
use Illuminate\Http\Response;
use Faker\Generator;

class ArtikelController extends Controller
{

    public function index()
    {
        $value = '1';
        $artikel = Artikel::with('user')->with('artikel_kategori')->get();
        foreach ($artikel as $key => $value) {
            $artikel[$key]['cover'] = asset('files/artikel/image/'.$value['cover']);
        }
        return response($artikel->jsonSerialize(), Response::HTTP_OK);
    }

    public function show($id)
    {
        $value = '1';
        $artikel = Artikel::where('id',$id)->with('user')->with('artikel_kategori')->first();
        $artikel['cover'] = asset('files/artikel/image/'.$artikel['cover']);
        return response($artikel->jsonSerialize(), Response::HTTP_OK);
    }

    public function new()
    {
        $value = '1';
        $artikel = Artikel::orderBy('created_at', 'desc')->limit(3)->with('user')->with('artikel_kategori')->get();
        foreach ($artikel as $key => $value) {
            $artikel[$key]['cover'] = asset('files/artikel/image/'.$value['cover']);
        }
        return response($artikel->jsonSerialize(), Response::HTTP_OK);
    }
}
