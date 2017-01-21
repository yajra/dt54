<?php

namespace App\Http\Controllers\Eloquent;

use App\Http\Controllers\Controller;
use App\User;
use Yajra\Datatables\Datatables;

class HasOneController extends Controller
{
    /**
     * Display index page.
     *
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('eloquent.has-one');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        $query = User::with('post')->select('users.*');

        return $datatables->eloquent($query)
                          ->addColumn('title', function (User $user) {
                              return $user->blogs->map(function ($blog) {
                                  return str_limit($blog->title, 30, '...');
                              })->implode('<br>');
                          })
                          ->make(true);
    }
}
