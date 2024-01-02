<?php

namespace App\Http\Controllers;

use App\Http\Repository\UserRepository;
use App\Http\Repository\UserAreaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Group;
use App\Models\UserGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userRepository, $userAreaRepository;

    public function __construct(UserRepository $user, UserAreaRepository $userAreaRepository)
    {
        $this->middleware(function ($request, $next) {
            Session::put('menu_active', '/users');
            return $next($request);
        });
        $this->userRepository = $user;
        $this->userAreaRepository = $userAreaRepository;
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $user_group = UserGroup::find($user->id);

        if ($user && $user_group->group_id == 1) {
            $group = Group::get();
            $data = $this->userRepository->get_all();
        } else {
            $data = $this->userRepository->without_admin();
            $group = Group::where('id', '<>', 1)->get();
        }

        return view('page.users.users', compact('data', 'group'));
    }

    public function create()
    {
        $user = Auth::user();
        $user_group = UserGroup::find($user->id);

        if ($user && $user_group->group_id == 1) {
            $group = Group::get();
            $data = $this->userRepository->get_all();
        } else {
            $data = $this->userRepository->without_admin();
            $group = Group::where('id', '<>', 1)->get();
        }

        return view('page.users.create', compact('data', 'group'));
    }

    public function edit($id)
    {
        $user = User::with('user_group', 'user_area')->where('id', $id)->first();
        // dd($user->user_area);
        $user_group = UserGroup::where('user_id', $user->id)->first();

        if ($user && $user_group->group_id == 1) {
            $group = Group::get();
            $data = $this->userRepository->get_data_by_id($id);
        } else {
            $data = $this->userRepository->get_data_by_id($id);
            $group = Group::where('id', '<>', 1)->get();
        }

        return view('page.users.edit', compact('user', 'group'));
    }

    public function show($id)
    {
        $data = $this->userRepository->getDetailUserWithUserGroup($id);
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
        if ($request->password !== $request->confirm_password) {
            return back()->with(
                'message',
                [
                    'content' => 'Gagal tambah user! Password tidak cocok',
                    'type' => 'danger'
                ]
            );
        }

        $user = $this->userRepository->create($request->all());

        $group_id = $request->group_id;
        $user_id = $user->id;

        UserGroup::create([
            'user_id' => $user_id,
            'group_id' => $group_id,
        ]);

        $nasional = $request->tingkat === '0' ? true : false;

        if ($nasional) {
            $this->userAreaRepository->create($user_id, $nasional, '');
        } elseif ($request->tingkat === '1' && count($request->prov) > 0) {
            foreach ($request->prov as $provinsi) {
                $this->userAreaRepository->create($user_id, $nasional, $provinsi);
            }
        } elseif ($request->tingkat === '2' && count($request->prov) > 0 && count($request->kab) > 0) {
            foreach ($request->prov as $provinsi) {
                foreach ($request->kab as $kabupaten) {
                    $this->userAreaRepository->create($user_id, $nasional, $provinsi, $kabupaten);
                }
            }
        }

        return back()->with(
            'message',
            [
                'content' => 'Berhasil tambah user!',
                'type' => 'success'
            ]
        );
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status_user' => 'required|in:active,nonactive',
            'group_id' => 'required',
        ]);

        User::where('id', $id)->update([
            'status' => $request->input('status_user'),
        ]);

        UserGroup::where('user_id', $id)->update([
            'group_id' => $request->input('group_id'),
        ]);

        $nasional = $request->tingkat === '0' ? true : false;

        $this->userAreaRepository->delete($id);

        if ($nasional) {
            $this->userAreaRepository->create($id, $nasional, '');
        } elseif ($request->tingkat === '1' && count($request->prov) > 0) {
            foreach ($request->prov as $provinsi) {
                $this->userAreaRepository->create($id, $nasional, $provinsi);
            }
        } elseif ($request->tingkat === '2' && count($request->prov) > 0 && count($request->kab) > 0) {
            foreach ($request->prov as $provinsi) {
                foreach ($request->kab as $kabupaten) {
                    $this->userAreaRepository->create($id, $nasional, $provinsi, $kabupaten);
                }
            }
        }

        return back()->with(
            'message',
            [
                'content' => 'Berhasil update user!',
                'type' => 'success'
            ]
        );
    }

    public function showPassword($id)
    {
        $data = $this->userRepository->get_data_by_id($id);
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
}
