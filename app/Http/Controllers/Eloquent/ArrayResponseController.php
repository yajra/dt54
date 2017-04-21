<?php

namespace App\Http\Controllers\Eloquent;

use App\Http\Controllers\Controller;
use App\User;
use Yajra\Datatables\Datatables;

class ArrayResponseController extends Controller
{
    /**
     * Display index page.
     *
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('eloquent.array');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(User::select('id', 'name', 'email', 'created_at', 'updated_at'))
                          ->addColumn('action', 'eloquent.tables.users-action')
                          ->rawColumns([5])
                          ->make();
    }
}
