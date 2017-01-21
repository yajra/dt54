<?php

namespace App\Http\Controllers\Eloquent;

use App\Http\Controllers\Controller;
use App\User;
use Yajra\Datatables\Datatables;

class HasManyController extends Controller
{
    /**
     * Display index page.
     *
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('eloquent.has-many');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        $query = User::with('posts')->select('users.*');

        return $datatables->eloquent($query)
                          ->addColumn('title', function (User $user) {
                              return $user->posts->map(function ($post) {
                                  return str_limit($post->title, 30, '...');
                              })->implode('<br>');
                          })
                          ->make(true);
    }
}
