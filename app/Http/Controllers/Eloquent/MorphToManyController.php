<?php

namespace App\Http\Controllers\Eloquent;

use App\Http\Controllers\Controller;
use App\Post;
use Yajra\Datatables\Datatables;

class MorphToManyController extends Controller
{
    /**
     * Display index page.
     *
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('eloquent.morph-to-many');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        $query = Post::with('tags')->select('posts.*');

        return $datatables->eloquent($query)
                          ->addColumn('tags', function (Post $post) {
                              return $post->tags->pluck('name')->implode('<br>');
                          })
                          ->rawColumns(['tags'])
                          ->make(true);
    }
}
