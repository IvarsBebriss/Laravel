<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminPhotosController extends Controller
{
    public function index(){

        $photos = Photo::all();
        return view('admin.media.index', compact('photos'));

    }

    public function show($id){


    }
}
