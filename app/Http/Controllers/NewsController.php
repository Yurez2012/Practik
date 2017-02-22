<?php

namespace App\Http\Controllers;

use App\Category;
use App\diagram;
use App\Http\Requests\LikeRequest;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\SearchRequest;
use App\Like;
use App\LikeNews;
use App\Menu;
use App\News;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class NewsController extends Controller
{

    // menu and category get from global tamplate NEWS
    public function __construct()
    {
        $category = Category::all();
        $menu = Menu::all();
        $token = Crypt::encrypt(csrf_token());

        View::share('menu', $menu);
        View::share('category', $category);
        View::share('token', $token);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * global variables from menu panel
     * pagination from page
     */

    public function index()
    {

        // add news user db
        $user['ip_user'] = $_SERVER['REMOTE_ADDR'];
        $users = diagram::all();

        if(empty($users[0])) { diagram::create($user); }

        $true = null;
        foreach ($users as $us) {
            if($user['ip_user'] == $us->ip_user) {
                $true = 1;
            }
        }

        if($true != 1) { diagram::create($user); }
        //end add new user

        $news = LikeNews::orderBy('date_to_add', 'asc')->paginate(5);
        return view('news.news', compact('news'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * create cookie from view update news
     */

    public function indexAdmin()
    {
        $news = News::orderBy('date_to_add', 'desc')->paginate(10);
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

        //view show increment viewNews
        $news->show = $news->show + 1;
        $news->save();

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

        //update img from server
        $request = $request->all();
        $request['img'] = $_FILES['img']['name'];
        $path_img = $_SERVER['DOCUMENT_ROOT'].'/assets/image/'.$_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], $path_img);
        //end upload

        $news->update($request);
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
        $news = News::where('category', $category[0]['category'])->orderBy('date_to_add', 'desc')->paginate(5);
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
            $news = LikeNews::where('title', 'LIKE', '%'.$search.'%')->paginate(5);
            if(empty($news['0'])) {
                $search = null;
            }

        }else {
            $search = null;
        }

        return  view('news.search', compact('news', 'search'));

    }

    /**
     * @param LikeRequest $request
     *
     * Like news
     * Delete Like
     */

    public function like(LikeRequest $request)
    {

        $like = Like::all();
        $request = $request->all();

        if(!isset($like['0'])){
            Like::create($request);
        }

        foreach ($like as $liked) {
            if($liked->user_id == $request['user_id'] && $liked->news_id == $request['news_id']) {

            }else {
                Like::create($request);
            }
        }

    }

    public function likeDelete(LikeRequest $request)
    {
        $like = $request->all();
        $like = Like::where('user_id', $like['user_id'])->where('news_id', $like['news_id']);
        $like->delete();
    }

}








