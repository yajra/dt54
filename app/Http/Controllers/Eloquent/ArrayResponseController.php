<?php

namespace App\Http\Controllers\Eloquent;

use App\Http\Controllers\Controller;
use App\User;
use Yajra\Datatables\Datatables;

class ArrayResponseController extends Controller
{
    public function index()
    {
        return view('eloquent.array');
    }

    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(User::query())
                          ->addColumn('action', 'eloquent.tables.users-action')
                          ->make();
    }
}
