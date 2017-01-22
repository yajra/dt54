<?php

namespace App\Http\Controllers\Buttons;

use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EloquentController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('buttons.eloquent.index');
    }
}
