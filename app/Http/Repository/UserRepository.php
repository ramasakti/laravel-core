<?php

namespace App\Http\Repository;

use App\Models\Conversion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    protected $user;

    public function __construct(User $con)
    {
        $this->user = $con;
    }

    public function get_all()
    {
        return DB::table('users')
            ->join('user_groups', 'users.id', '=', 'user_groups.user_id')
            ->join('groups', 'user_groups.group_id', '=', 'groups.id')
            ->select('users.id', 'users.name', 'users.username', 'users.status', 'users.created_at', 'groups.name as role')
            ->get();
    }

    public function without_admin()
    {
        return DB::table('users')
            ->join('user_groups', 'users.id', '=', 'user_groups.user_id')
            ->join('groups', 'user_groups.group_id', '=', 'groups.id')
            ->select('users.id', 'users.name', 'users.username', 'users.status', 'users.created_at', 'groups.name as role')
            ->where('groups.id', '!=', 1)
            ->get();
    }

    public function getDetailUserWithUserGroup($id)
    {
        return $this->user->with('user_group')->where('id', $id)->first();
    }

    public function get_data_by_id($id)
    {
        return $this->user->where('id', $id)->first();
    }

    public function create($data)
    {
        $arr = [
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'status' => "active",
        ];
        $user = $this->user->create($arr);

        return $user;
    }
}
