<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('index')->with('Post',Post::orderBy('created_at','desc')->first());
    }
}
