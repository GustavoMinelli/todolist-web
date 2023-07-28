<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View { 

        $pages = Page::where('user_id', auth()->user()->id)->get();

        $data = [
            'pages' => $pages,
        ];

        return view('dashboard', $data);

    }
}
