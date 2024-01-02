<?php

namespace App\Http\Repository;

use App\Models\Conversion;
use App\Models\UserArea;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserAreaRepository
{
    protected $userArea;

    public function __construct(UserArea $con)
    {
        $this->userArea = $con;
    }

    public function get_all()
    {
        return $this->userArea->orderBy('id', 'desc')->get();
    }

    public function get_data_by_user_id($user_id)
    {
        return DB::table('users')
            ->select('users.id', 'users.name', 'user_area.nasional', 'user_area.prov', 'user_area.kota')
            ->leftJoin('user_area', 'user_area.user_id', '=', 'users.id')
            ->where('users.id', $user_id)
            ->get();
    }

    public function create($user_id, $nasional, $prov, $kab = '', $kec = '')
    {
        $arr = [
            'user_id' => $user_id,
            'nasional' => $nasional,
            'prov' => $prov,
            'kota' => $kab,
            'kec' => $kec,
        ];

        $userArea = $this->userArea->create($arr);

        return $userArea;
    }

    public function delete($user_id)
    {
        return DB::table('user_area')
            ->where('user_id', $user_id)
            ->delete();
    }
}
