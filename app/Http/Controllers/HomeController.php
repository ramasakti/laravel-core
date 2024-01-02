<?php

namespace App\Http\Controllers;

use App\Http\Repository\HomeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected
        $kategoriOutletChart,
        $jenisOutletChart,
        $tipeOutletChart,
        $tipePembelianChart,
        $homeRepository,
        $wilayah;

    public function __construct() {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            Session::put('menu_active', '/');
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function removeDuplicate($area)
    {
        $temp = '';
        $filter = [];
        $prv = array_column(Auth::user()->user_area->toArray(), $area);

        foreach ($prv as $value) {
            if ($value !== $temp) {
                array_push($filter, $value);
                $temp = $value;
            }
        }

        return $filter;
    }

    public function index(Request $request)
    {
        $userArea = Auth::user()->user_area->toArray();
        $user = DB::table('users')->count();

        return view(
            'home',
            compact('userArea', 'user')
        );
    }
}
