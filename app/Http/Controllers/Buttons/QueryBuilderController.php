<?php

namespace App\Http\Controllers\Buttons;

use App\DataTables\Buttons\UsersQueryBuilderDataTable;
use App\Http\Controllers\Controller;

class QueryBuilderController extends Controller
{
    /**
     * Display index page and process dataTable ajax request.
     *
     * @param \App\DataTables\Buttons\UsersQueryBuilderDataTable $dataTable
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(UsersQueryBuilderDataTable $dataTable)
    {
        return $dataTable->render('buttons.query.index');
    }

    /**
     * Show create user page.
     *
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('buttons.query.create');
    }
}
