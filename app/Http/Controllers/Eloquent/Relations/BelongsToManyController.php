<?php

namespace App\Http\Controllers\Eloquent\Relations;

use App\Http\Controllers\Controller;
use App\User;
use Yajra\Datatables\Datatables;

class BelongsToManyController extends Controller
{
    /**
     * Display index page.
     *
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('eloquent.relations.belongs-to-many');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        $query = User::first()->blogs()->select('posts.*');

        return $datatables->eloquent($query)
                          ->addColumn('action', 'eloquent.tables.posts-action')
                          ->make(true);
    }
}
