<?php

namespace App\Http\Repository;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeRepository
{
    public function get_outlet($param, $tgl_awal = '', $tgl_akhir = '')
    {
        $userArea = Auth::user()->user_area->toArray();
        $provUserArea = array_unique(array_column($userArea, 'prov'));
        $kabUserArea = array_column($userArea, 'kota');

        if ($param['provinsi'] != null || $param['kota'] != null || $param['kecamatan'] != null || $param['kelurahan'] != null) {
            $query = DB::table('outlet')
                ->select('alamat_outlet.provinsi', 'alamat_outlet.kota', 'alamat_outlet.kecamatan', 'alamat_outlet.kelurahan')
                ->join('alamat_outlet', 'alamat_outlet.outlet_id', '=', 'outlet.id_outlet')
                ->when(!empty($tgl_awal) && !empty($tgl_akhir), function ($q) use ($tgl_awal, $tgl_akhir) {
                    $q->whereBetween('alamat_outlet.created_at', [$tgl_awal, $tgl_akhir]);
                })
                ->when($param['provinsi'], function ($q) use ($param) {
                    $q->where('alamat_outlet.provinsi', $param['provinsi']);
                })
                ->when($param['kota'], function ($q) use ($param) {
                    $q->where('alamat_outlet.kota', $param['kota']);
                })
                ->when($param['kecamatan'], function ($q) use ($param) {
                    $q->where('alamat_outlet.kecamatan', $param['kecamatan']);
                })
                ->when($param['kelurahan'], function ($q) use ($param) {
                    $q->where('alamat_outlet.kelurahan', $param['kelurahan']);
                })
                ->where('outlet.verified', 1)
                ->count();
        } else {
            if ($userArea[0]['nasional'] === 1) {
                $query = DB::table('outlet')
                    ->select('alamat_outlet.provinsi', 'alamat_outlet.kota', 'alamat_outlet.kecamatan', 'alamat_outlet.kelurahan')
                    ->join('alamat_outlet', 'alamat_outlet.outlet_id', '=', 'outlet.id_outlet')
                    ->when(!empty($tgl_awal) && !empty($tgl_akhir), function ($q) use ($tgl_awal, $tgl_akhir) {
                        $q->whereBetween('alamat_outlet.created_at', [$tgl_awal, $tgl_akhir]);
                    })
                    ->when($param['provinsi'], function ($q) use ($param) {
                        $q->where('alamat_outlet.provinsi', $param['provinsi']);
                    })
                    ->when($param['kota'], function ($q) use ($param) {
                        $q->where('alamat_outlet.kota', $param['kota']);
                    })
                    ->when($param['kecamatan'], function ($q) use ($param) {
                        $q->where('alamat_outlet.kecamatan', $param['kecamatan']);
                    })
                    ->when($param['kelurahan'], function ($q) use ($param) {
                        $q->where('alamat_outlet.kelurahan', $param['kelurahan']);
                    })
                    ->where('outlet.verified', 1)
                    ->count();
            } else {
                $query = DB::table('outlet')
                    ->select('alamat_outlet.provinsi', 'alamat_outlet.kota', 'alamat_outlet.kecamatan', 'alamat_outlet.kelurahan')
                    ->join('alamat_outlet', 'alamat_outlet.outlet_id', '=', 'outlet.id_outlet')
                    ->when(!empty($tgl_awal) && !empty($tgl_akhir), function ($q) use ($tgl_awal, $tgl_akhir) {
                        $q->whereBetween('alamat_outlet.created_at', [$tgl_awal, $tgl_akhir]);
                    })
                    ->when($provUserArea, function ($q) use ($provUserArea) {
                        $q->whereIn('alamat_outlet.provinsi', $provUserArea);
                    })
                    ->when($kabUserArea, function ($q) use ($kabUserArea) {
                        $q->whereIn('alamat_outlet.kota', $kabUserArea);
                    })
                    ->where('outlet.verified', 1)
                    ->count();
            }
        }

        return $query;
    }

    public function not_yet_outlet_verif($param, $tgl_awal = '', $tgl_akhir = '')
    {
        $userArea = Auth::user()->user_area->toArray();
        $provUserArea = array_unique(array_column($userArea, 'prov'));
        $kabUserArea = array_column($userArea, 'kota');

        if ($param['provinsi'] != null || $param['kota'] != null || $param['kecamatan'] != null || $param['kelurahan'] != null) {
            $query = DB::table('outlet')
                ->select('alamat_outlet.provinsi', 'alamat_outlet.kota', 'alamat_outlet.kecamatan', 'alamat_outlet.kelurahan')
                ->join('alamat_outlet', 'alamat_outlet.outlet_id', '=', 'outlet.id_outlet')
                ->when(!empty($tgl_awal) && !empty($tgl_akhir), function ($q) use ($tgl_awal, $tgl_akhir) {
                    $q->whereBetween('alamat_outlet.created_at', [$tgl_awal, $tgl_akhir]);
                })
                ->when($param['provinsi'], function ($q) use ($param) {
                    $q->where('alamat_outlet.provinsi', $param['provinsi']);
                })
                ->when($param['kota'], function ($q) use ($param) {
                    $q->where('alamat_outlet.kota', $param['kota']);
                })
                ->when($param['kecamatan'], function ($q) use ($param) {
                    $q->where('alamat_outlet.kecamatan', $param['kecamatan']);
                })
                ->when($param['kelurahan'], function ($q) use ($param) {
                    $q->where('alamat_outlet.kelurahan', $param['kelurahan']);
                })
                ->where('outlet.verified', 0)
                ->count();
        } else {
            if ($userArea[0]['nasional'] === 1) {
                $query = DB::table('outlet')
                    ->select('alamat_outlet.provinsi', 'alamat_outlet.kota', 'alamat_outlet.kecamatan', 'alamat_outlet.kelurahan')
                    ->join('alamat_outlet', 'alamat_outlet.outlet_id', '=', 'outlet.id_outlet')
                    ->when(!empty($tgl_awal) && !empty($tgl_akhir), function ($q) use ($tgl_awal, $tgl_akhir) {
                        $q->whereBetween('alamat_outlet.created_at', [$tgl_awal, $tgl_akhir]);
                    })
                    ->when($param['provinsi'], function ($q) use ($param) {
                        $q->where('alamat_outlet.provinsi', $param['provinsi']);
                    })
                    ->when($param['kota'], function ($q) use ($param) {
                        $q->where('alamat_outlet.kota', $param['kota']);
                    })
                    ->when($param['kecamatan'], function ($q) use ($param) {
                        $q->where('alamat_outlet.kecamatan', $param['kecamatan']);
                    })
                    ->when($param['kelurahan'], function ($q) use ($param) {
                        $q->where('alamat_outlet.kelurahan', $param['kelurahan']);
                    })
                    ->where('outlet.verified', 0)
                    ->count();
            } else {
                $query = DB::table('outlet')
                    ->select('alamat_outlet.provinsi', 'alamat_outlet.kota', 'alamat_outlet.kecamatan', 'alamat_outlet.kelurahan')
                    ->join('alamat_outlet', 'alamat_outlet.outlet_id', '=', 'outlet.id_outlet')
                    ->when(!empty($tgl_awal) && !empty($tgl_akhir), function ($q) use ($tgl_awal, $tgl_akhir) {
                        $q->whereBetween('alamat_outlet.created_at', [$tgl_awal, $tgl_akhir]);
                    })
                    ->when($provUserArea, function ($q) use ($provUserArea) {
                        $q->whereIn('alamat_outlet.provinsi', $provUserArea);
                    })
                    ->when($kabUserArea, function ($q) use ($kabUserArea) {
                        $q->whereIn('alamat_outlet.kota', $kabUserArea);
                    })
                    ->where('outlet.verified', 0)
                    ->count();
            }
        }

        return $query;
    }

    public function get_survey($param, $tgl_awal = '', $tgl_akhir = '')
    {
        $userArea = Auth::user()->user_area->toArray();
        $provUserArea = array_unique(array_column($userArea, 'prov'));
        $kabUserArea = array_column($userArea, 'kota');

        if ($param['provinsi'] != null || $param['kota'] != null || $param['kecamatan'] != null || $param['kelurahan'] != null) {
            $query = DB::table('survey')
                ->select('alamat_outlet.provinsi', 'alamat_outlet.kota', 'alamat_outlet.kecamatan', 'alamat_outlet.kelurahan')
                ->join('alamat_outlet', 'alamat_outlet.outlet_id', '=', 'survey.id_outlet')
                ->when(!empty($tgl_awal) && !empty($tgl_akhir), function ($q) use ($tgl_awal, $tgl_akhir) {
                    $q->whereBetween('alamat_outlet.created_at', [$tgl_awal, $tgl_akhir]);
                })
                ->when($param['provinsi'], function ($q) use ($param) {
                    $q->where('alamat_outlet.provinsi', $param['provinsi']);
                })
                ->when($param['kota'], function ($q) use ($param) {
                    $q->where('alamat_outlet.kota', $param['kota']);
                })
                ->when($param['kecamatan'], function ($q) use ($param) {
                    $q->where('alamat_outlet.kecamatan', $param['kecamatan']);
                })
                ->when($param['kelurahan'], function ($q) use ($param) {
                    $q->where('alamat_outlet.kelurahan', $param['kelurahan']);
                })
                ->where('survey.verified', 1)
                ->count();
        } else {
            if ($userArea[0]['nasional'] === 1) {
                $query = DB::table('survey')
                    ->select('alamat_outlet.provinsi', 'alamat_outlet.kota', 'alamat_outlet.kecamatan', 'alamat_outlet.kelurahan')
                    ->join('alamat_outlet', 'alamat_outlet.outlet_id', '=', 'survey.id_outlet')
                    ->when(!empty($tgl_awal) && !empty($tgl_akhir), function ($q) use ($tgl_awal, $tgl_akhir) {
                        $q->whereBetween('alamat_outlet.created_at', [$tgl_awal, $tgl_akhir]);
                    })
                    ->when($param['provinsi'], function ($q) use ($param) {
                        $q->where('alamat_outlet.provinsi', $param['provinsi']);
                    })
                    ->when($param['kota'], function ($q) use ($param) {
                        $q->where('alamat_outlet.kota', $param['kota']);
                    })
                    ->when($param['kecamatan'], function ($q) use ($param) {
                        $q->where('alamat_outlet.kecamatan', $param['kecamatan']);
                    })
                    ->when($param['kelurahan'], function ($q) use ($param) {
                        $q->where('alamat_outlet.kelurahan', $param['kelurahan']);
                    })
                    ->where('survey.verified', 1)
                    ->count();
            } else {
                $query = DB::table('survey')
                    ->select('alamat_outlet.provinsi', 'alamat_outlet.kota', 'alamat_outlet.kecamatan', 'alamat_outlet.kelurahan')
                    ->join('alamat_outlet', 'alamat_outlet.outlet_id', '=', 'survey.id_outlet')
                    ->when(!empty($tgl_awal) && !empty($tgl_akhir), function ($q) use ($tgl_awal, $tgl_akhir) {
                        $q->whereBetween('alamat_outlet.created_at', [$tgl_awal, $tgl_akhir]);
                    })
                    ->when($provUserArea, function ($q) use ($provUserArea) {
                        $q->whereIn('alamat_outlet.provinsi', $provUserArea);
                    })
                    ->when($kabUserArea, function ($q) use ($kabUserArea) {
                        $q->whereIn('alamat_outlet.kota', $kabUserArea);
                    })
                    ->where('survey.verified', 1)
                    ->count();
            }
        }

        return $query;
    }

    public function not_yet_survey_verif($param, $tgl_awal = '', $tgl_akhir = '')
    {
        $userArea = Auth::user()->user_area->toArray();
        $provUserArea = array_unique(array_column($userArea, 'prov'));
        $kabUserArea = array_column($userArea, 'kota');

        if ($param['provinsi'] != null || $param['kota'] != null || $param['kecamatan'] != null || $param['kelurahan'] != null) {
            $query = DB::table('survey')
                ->select('alamat_outlet.provinsi', 'alamat_outlet.kota', 'alamat_outlet.kecamatan', 'alamat_outlet.kelurahan')
                ->join('alamat_outlet', 'alamat_outlet.outlet_id', '=', 'survey.id_outlet')
                ->when(!empty($tgl_awal) && !empty($tgl_akhir), function ($q) use ($tgl_awal, $tgl_akhir) {
                    $q->whereBetween('alamat_outlet.created_at', [$tgl_awal, $tgl_akhir]);
                })
                ->when($param['provinsi'], function ($q) use ($param) {
                    $q->where('alamat_outlet.provinsi', $param['provinsi']);
                })
                ->when($param['kota'], function ($q) use ($param) {
                    $q->where('alamat_outlet.kota', $param['kota']);
                })
                ->when($param['kecamatan'], function ($q) use ($param) {
                    $q->where('alamat_outlet.kecamatan', $param['kecamatan']);
                })
                ->when($param['kelurahan'], function ($q) use ($param) {
                    $q->where('alamat_outlet.kelurahan', $param['kelurahan']);
                })
                ->where('survey.verified', 0)
                ->count();
        } else {
            if ($userArea[0]['nasional'] === 1) {
                $query = DB::table('survey')
                    ->select('alamat_outlet.provinsi', 'alamat_outlet.kota', 'alamat_outlet.kecamatan', 'alamat_outlet.kelurahan')
                    ->join('alamat_outlet', 'alamat_outlet.outlet_id', '=', 'survey.id_outlet')
                    ->when(!empty($tgl_awal) && !empty($tgl_akhir), function ($q) use ($tgl_awal, $tgl_akhir) {
                        $q->whereBetween('alamat_outlet.created_at', [$tgl_awal, $tgl_akhir]);
                    })
                    ->when($param['provinsi'], function ($q) use ($param) {
                        $q->where('alamat_outlet.provinsi', $param['provinsi']);
                    })
                    ->when($param['kota'], function ($q) use ($param) {
                        $q->where('alamat_outlet.kota', $param['kota']);
                    })
                    ->when($param['kecamatan'], function ($q) use ($param) {
                        $q->where('alamat_outlet.kecamatan', $param['kecamatan']);
                    })
                    ->when($param['kelurahan'], function ($q) use ($param) {
                        $q->where('alamat_outlet.kelurahan', $param['kelurahan']);
                    })
                    ->where('survey.verified', 0)
                    ->count();
            } else {
                $query = DB::table('survey')
                    ->select('alamat_outlet.provinsi', 'alamat_outlet.kota', 'alamat_outlet.kecamatan', 'alamat_outlet.kelurahan')
                    ->join('alamat_outlet', 'alamat_outlet.outlet_id', '=', 'survey.id_outlet')
                    ->when(!empty($tgl_awal) && !empty($tgl_akhir), function ($q) use ($tgl_awal, $tgl_akhir) {
                        $q->whereBetween('alamat_outlet.created_at', [$tgl_awal, $tgl_akhir]);
                    })
                    ->when($provUserArea, function ($q) use ($provUserArea) {
                        $q->whereIn('alamat_outlet.provinsi', $provUserArea);
                    })
                    ->when($kabUserArea, function ($q) use ($kabUserArea) {
                        $q->whereIn('alamat_outlet.kota', $kabUserArea);
                    })
                    ->where('survey.verified', 0)
                    ->count();
            }
        }

        return $query;
    }

    public function get_wilayah($param, $tgl_awal = '', $tgl_akhir = '')
    {
        $userArea = Auth::user()->user_area->toArray();
        $provUserArea = array_unique(array_column($userArea, 'prov'));
        $kabUserArea = array_column($userArea, 'kota');

        if ($param['provinsi'] != null || $param['kota'] != null || $param['kecamatan'] != null || $param['kelurahan'] != null) {
            $query = DB::table('alamat_outlet')
                ->select('provinsi', 'kota', 'kecamatan', 'kelurahan')
                ->join('outlet', 'outlet.id_outlet', '=', 'alamat_outlet.outlet_id')
                ->when(!empty($tgl_awal) && !empty($tgl_akhir), function ($q) use ($tgl_awal, $tgl_akhir) {
                    $q->whereBetween('alamat_outlet.created_at', [$tgl_awal, $tgl_akhir]);
                })
                ->when($param['provinsi'], function ($q) use ($param) {
                    $q->where('alamat_outlet.provinsi', $param['provinsi']);
                })
                ->when($param['kota'], function ($q) use ($param) {
                    $q->where('alamat_outlet.kota', $param['kota']);
                })
                ->when($param['kecamatan'], function ($q) use ($param) {
                    $q->where('alamat_outlet.kecamatan', $param['kecamatan']);
                })
                ->when($param['kelurahan'], function ($q) use ($param) {
                    $q->where('alamat_outlet.kelurahan', $param['kelurahan']);
                })
                ->where('outlet.verified', 1)
                ->get();
        } else {
            if ($userArea[0]['nasional'] === 1) {
                $query = DB::table('alamat_outlet')
                    ->select('provinsi', 'kota', 'kecamatan', 'kelurahan')
                    ->join('outlet', 'outlet.id_outlet', '=', 'alamat_outlet.outlet_id')
                    ->when(!empty($tgl_awal) && !empty($tgl_akhir), function ($q) use ($tgl_awal, $tgl_akhir) {
                        $q->whereBetween('alamat_outlet.created_at', [$tgl_awal, $tgl_akhir]);
                    })
                    ->when($param['provinsi'], function ($q) use ($param) {
                        $q->where('alamat_outlet.provinsi', $param['provinsi']);
                    })
                    ->when($param['kota'], function ($q) use ($param) {
                        $q->where('alamat_outlet.kota', $param['kota']);
                    })
                    ->when($param['kecamatan'], function ($q) use ($param) {
                        $q->where('alamat_outlet.kecamatan', $param['kecamatan']);
                    })
                    ->when($param['kelurahan'], function ($q) use ($param) {
                        $q->where('alamat_outlet.kelurahan', $param['kelurahan']);
                    })
                    ->where('outlet.verified', 1)
                    ->get();
            } else {
                $query = DB::table('alamat_outlet')
                    ->select('provinsi', 'kota', 'kecamatan', 'kelurahan')
                    ->join('outlet', 'outlet.id_outlet', '=', 'alamat_outlet.outlet_id')
                    ->when(!empty($tgl_awal) && !empty($tgl_akhir), function ($q) use ($tgl_awal, $tgl_akhir) {
                        $q->whereBetween('alamat_outlet.created_at', [$tgl_awal, $tgl_akhir]);
                    })
                    ->when($provUserArea, function ($q) use ($provUserArea) {
                        $q->whereIn('alamat_outlet.provinsi', $provUserArea);
                    })
                    ->when($kabUserArea, function ($q) use ($kabUserArea) {
                        $q->whereIn('alamat_outlet.kota', $kabUserArea);
                    })
                    // ->when($param['kecamatan'], function ($q) use ($param) {
                    //     $q->where('alamat_outlet.kecamatan', $param['kecamatan']);
                    // })
                    // ->when($param['kelurahan'], function ($q) use ($param) {
                    //     $q->where('alamat_outlet.kelurahan', $param['kelurahan']);
                    // })
                    ->where('outlet.verified', 1)
                    ->get();
            }
        }

        return $query;
    }
}
