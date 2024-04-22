<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $users = DB::select('CALL sp_get_users()');

        return view('report', compact('users'));
    }
}
