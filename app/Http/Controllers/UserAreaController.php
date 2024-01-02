<?php

namespace App\Http\Controllers;

use App\Http\Repository\UserAreaRepository;
use App\Http\Repository\WilayahRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\UserArea;
use App\Models\User;
use App\Models\Group;

class UserAreaController extends Controller
{
    protected $userAreaRepository, $wilayah;

    public function __construct(UserAreaRepository $userArea, WilayahRepository $wilayah)
    {
        $this->middleware(function ($request, $next) {
            Session::put('menu_active', '/users-area');
            return $next($request);
        });
        $this->userAreaRepository = $userArea;
        $this->wilayah = $wilayah;
    }

    public function index(Request $request)
    {
        $data = UserArea::get();
        $group = Group::get();
        // $users = $this->userAreaRepository->get_user_area();
        $users = User::with('groups', 'user_area')->get();
        // dd($users);
        $wilayah = $this->wilayah->getAllProvinsi();
        //dd($wilayah);
        return view('page.user-area', compact('data', 'group', 'users', 'wilayah'));
    }

    public function show($user_id)
    {
        $data = $this->userAreaRepository->get_data_by_user_id($user_id);
        if (!empty($data)) {
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        } else {
            return response()->json([
                'success' => false,
                'data' => []
            ]);
        }
    }

    public function store(Request $request)
    {
        $nasional = $request->tingkat === '0' ? true : false;

        if ($nasional) {
            $this->userAreaRepository->create($request->user_id, $nasional, '');
        } elseif ($request->tingkat === '1' && count($request->prov) > 0) {
            foreach ($request->prov as $provinsi) {
                $this->userAreaRepository->create($request->user_id, $nasional, $provinsi);
            }
        } elseif ($request->tingkat === '2' && count($request->prov) > 0 && count($request->kab) > 0) {
            foreach ($request->prov as $provinsi) {
                foreach ($request->kab as $kabupaten) {
                    $this->userAreaRepository->create($request->user_id, $nasional, $provinsi, $kabupaten);
                }
            }
        }

        return back()->with(
            'message',
            [
                'content' => 'Berhasil tambah user area!',
                'type' => 'success'
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6',
            'status' => 'required|in:active,nonactive'
        ]);

        User::where('id', $id)->update([
            'password' => bcrypt($request->input('password')),
            'status' => $request->input('status')
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diubah!'
        ]);
    }

    public function delete(Request $request)
    {
        $this->userAreaRepository->delete($request->user_id);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!'
        ]);
    }
}
