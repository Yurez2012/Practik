<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\SearchRequest;
use App\Menu;
use App\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class NewsController extends Controller
{

    // menu and category get from global tamplate NEWS
    public function __construct()
    {
        $category = Category::all();
        $menu = Menu::all();

        View::share('menu', $menu);
        View::share('category', $category);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * global variables from menu panel
     * pagination from page
     */

    public function index()
    {
        $news = News::orderBy('updated_at', 'desc')->paginate(5);
        return view('news.news', compact('news', 'pagination'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * create cookie from view update news
     */

    public function indexAdmin()
    {
        $news = News::orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.news.news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.news.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * $path_img path to save img
     */
    public function store(NewsRequest $request)
    {
        $request = $request->all();

        //upload img from server
        $request['img'] = $_FILES['img']['name'];
        $path_img = $_SERVER['DOCUMENT_ROOT'].'/assets/image/'.$_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $path_img);
        //end upload

        News::create($request);
        return redirect('auth/admin/news/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $news = News::findOrFail($id);
        return view('admin.news.editNews', compact('news', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $news = News::findOrFail($id);
        $news->update($request->all());
        return redirect('auth/admin/news/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect('auth/admin/news/index');
    }

    /*
     * @param $id
     *
     * find news sort category
     */

    public function category($id)
    {
        $category = Category::where('id', $id)->get();
        $news = News::where('category', $category[0]['category'])->orderBy('updated_at', 'desc')->paginate(5);
        return view('news.category', compact('news'));
    }

    /**
     *
     * Post request search and pull from News
     *
     */

    public function search(SearchRequest $request)
    {
        $search = $request['search'];
        if(!empty($search)) {
            $news = News::where('title', 'LIKE', '%'.$search.'%')->paginate(5);
        }else {
            $search = null;
        }

        return view('news.search', compact('news', 'search'));
    }


}








