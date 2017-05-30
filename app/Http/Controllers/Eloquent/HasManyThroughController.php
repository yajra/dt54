<?php

namespace App\Http\Controllers\Eloquent;

use App\Country;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;

class HasManyThroughController extends Controller
{
    /**
     * Display index page.
     *
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('eloquent.has-many-through');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        $query = Country::with('posts')->select('countries.*');

        return $datatables->eloquent($query)
                          ->addColumn('title', function (Country $country) {
                              return $country->posts->implode('title', '<br>');
                          })
                          ->rawColumns(['title'])
                          ->make(true);
    }
}
