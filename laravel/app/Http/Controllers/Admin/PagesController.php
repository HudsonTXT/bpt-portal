<?php

namespace App\Http\Controllers\Admin;

use Validator;
use App\Page;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class PagesController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {

        if (Gate::denies('all', Page::class)) {
            return redirect('home');
        }
        $pages =   Page::all();
        foreach ($pages as $page) {
            $page->creator = $page->creatorName->name;
            if($page->posted){
                $page->posted_status = 'Да';
            }else{
                $page->posted_status = 'Нет';
            }
        }
        return view('pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('create', Page::class)) {
            return redirect('home');
        }
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('create', Page::class)) {
            return redirect('home');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'small_desc' => 'required',
            'html' => 'required',
            'url' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('admin/pages/create')
                ->withErrors($validator)
                ->withInput();
        }

        $page = new Page;

        $page->title = $request->title;
        $page->small_desc = $request->small_desc;
        $page->html = $request->html;
        $page->url = $request->url;
        $page->posted = $request->posted;
        $page->created_by = auth()->user()->id;

        $page->saveOrFail();
        return redirect('admin/pages');





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public static function show($link)
    {
        $page = Page::where('url', '=', $link)->first();
        if($page->posted){
            return view('pages.show', ['page' => $page]);
        }else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        if (Gate::denies('update', Page::class)) {
            return redirect('home');
        }

        return view('pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        if (Gate::denies('update', Page::class)) {
            return redirect('home');
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'small_desc' => 'required',
            'html' => 'required',
            'url' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect('admin/pages/' . $page->id)
                ->withErrors($validator)
                ->withInput();
        }

        $page->title = $request->title;
        $page->small_desc = $request->small_desc;
        $page->html = $request->html;
        $page->url = $request->url;
        $page->posted = $request->posted;
        $page->created_by = auth()->user()->id;

        $page->saveOrFail();
        return redirect('admin/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if (Gate::denies('delete', Page::class)) {
            return redirect('home');
        }
        $page->delete();

        return redirect('admin/pages');
    }
}
