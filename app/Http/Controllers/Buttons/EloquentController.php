<?php

namespace App\Http\Controllers\Buttons;

use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EloquentController extends Controller
{
    /**
     * Display index page and process dataTable ajax request.
     *
     * @param \App\DataTables\UsersDataTable $dataTable
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('buttons.eloquent.index');
    }

    /**
     * Show create user page.
     *
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('buttons.eloquent.create');
    }
}
