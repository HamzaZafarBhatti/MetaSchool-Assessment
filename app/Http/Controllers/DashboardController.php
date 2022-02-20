<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $country = DB::table('countries')->where('id', auth()->user()->country_id)->get();
        if ($country[0]->code == 'pk') {
            date_default_timezone_set('Asia/Karachi');
        } else {
            date_default_timezone_set('Asia/Calcutta');
        }
        $todos = Todo::all();
        return view('user.dashboard', compact('todos'));
    }
}
