<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rating;

class AdminRatingController extends Controller
{
        public function index()
    {
        $ratings = Rating::orderBy('id', 'desc')->get();
        return view('admin.rating.index', compact('ratings'));
    }
}
