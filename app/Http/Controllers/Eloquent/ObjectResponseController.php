<?php

namespace App\Http\Controllers\Eloquent;

use App\Http\Controllers\Controller;
use App\User;
use Yajra\Datatables\Datatables;

class ObjectResponseController extends Controller
{
    /**
     * Display index page.
     *
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('eloquent.object');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(User::query())
                          ->addColumn('action', 'eloquent.tables.users-action')
                          ->make(true);
    }
}
