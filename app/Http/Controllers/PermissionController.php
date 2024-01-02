<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Group;
use App\Models\UserGroup;
use App\Models\Actions;
use App\Models\ActionGroups;
use App\Models\MasterAction;
use App\Http\Repository\MenuRepository;
use App\Http\Repository\PermissionRepository;
use App\Models\MenuSection;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    protected $menu;
    protected $permission;

    public function __construct(MenuRepository $menu, PermissionRepository $permission)
    {
        $this->menu = $menu;
        $this->permission = $permission;
    }

    public function data_akses($id)
    {
        $groups = Group::find($id);
        $master_action = MasterAction::get();
        $menus = Menu::orderBy('section_id', 'ASC')->get();
        $menu_sections = MenuSection::get();

        return view('page.permissions.data-akses', compact('groups', 'master_action', 'menus', 'menu_sections'));
    }


    public function edit_akses(Request $request, Actions $actions, ActionGroups $actionGroups)
    {
        $this->permission->actionId($request, $actions, $actionGroups);

        return response()->json([
            'status'  => 'success',
            'message' => 'Akses berhasil di ubah'
        ]);
    }

    public function all_access(Request $request)
    {
        $this->permission->all_access($request);

        return response()->json([
            'status'  => 'success',
            'message' => 'Akses berhasil di ubah'
        ]);
    }
}
