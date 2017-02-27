<?php

namespace App\Http\Controllers;

use App\diagram;
use App\LikeNews;
use App\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class DiagramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = diagram::User();
        return view('diagram.user', compact('user'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function news()
    {
        $news = LikeNews::orderBy('show', 'desc')->paginate(5);
        return view('diagram.news', compact('news'));
    }

}
