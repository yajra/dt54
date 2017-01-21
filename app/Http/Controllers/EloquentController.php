<?php

namespace App\Http\Controllers;

use App\User;
use Yajra\Datatables\Datatables;

class EloquentController extends Controller
{
    /**
     * Display index page.
     *
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('eloquent.index');
    }

    /**
     * Display the given view.
     *
     * @param string $view
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function display($view)
    {
        $path = 'eloquent.' . $view;
        if (view()->exists($path)) {
            return view($path);
        }

        abort(404, 'Page not found');
    }

    /**
     * Process dataTables ajax response.
     *
     * @param \Yajra\Datatables\Datatables $dataTable
     * @return \Illuminate\Http\JsonResponse
     */
    public function usersData(Datatables $dataTable)
    {
        return $dataTable->eloquent(User::with('posts', 'post'))
                         ->addColumn('action', 'eloquent.tables.users-action')
                         ->make(true);
    }
}
