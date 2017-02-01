<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use App\News;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //increment news from count news
        $count = count(News::all());
        return view('admin.index', compact('count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * Show all news in panel admin
     */
    public function news()
    {
        $news = News::all();
        return view('admin.news', compact('news'));
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * edit news from admin panel
     */

    public function editNews($id)
    {
        $news = News::findOrFail($id);
        return view('admin.editNews', compact('news'));
    }

    public function updateNews(NewsRequest $request, $id)
    {
        $news = News::findOrFail($id);
        $news->update($request->all());
        return redirect('auth/admin/news');
    }

    public function destroyNews($id)
    {
        dd($id);
        return redirect('auth/admin/news');
    }

}
