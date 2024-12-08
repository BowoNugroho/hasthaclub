<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\ModelHasRole;
use Spatie\Permission\Models\Role;
use App\Models\User;

class HasRoleController extends Controller
{
    public function index()
    {
        $roles = ModelHasRole::getRole();
        $users = ModelHasRole::getUser();
        return view('panel::hasRole.index', compact('roles', 'users'));  // Create this view
    }

    public function datatables(Request $request)
    {
        $columns = ['role_id', 'role_name', 'model_type', 'model_id', 'user_name'];  // Define the columns you want to display
        $query = ModelHasRole::query()
            ->leftJoin('users', 'model_has_roles.model_id', '=', 'users.id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select('model_has_roles.*', 'users.name as user_name', 'roles.name as role_name');


        // Apply search filter
        if ($search = $request->input('search.value')) {

            $query->where(function ($query) use ($search) {
                $columns = ['role_id', 'model_type', 'model_id'];  // Define the columns you want to display
                foreach ($columns as $column) {
                    $query->orWhere($column, 'like', "%$search%")
                        ->orWhere('users.name', 'like', "%$search%")
                        ->orWhere('roles.name', 'like', "%$search%");
                }
            });
        }

        // Apply sorting
        if ($order = $request->input('order')) {
            $columnIndex = $order[0]['column'];
            $direction = $order[0]['dir'];
            $query->orderBy($columns[$columnIndex], $direction);
        }

        // Apply pagination
        $length = $request->input('length', 10);
        $start = $request->input('start', 0);

        $data = $query->offset($start)->limit($length)->get();
        $totalRecords = ModelHasRole::count();

        // Prepare response for DataTable
        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data,
        ]);
    }

    public function saveHasRole(Request $request)
    {
        $validated = $request->validate([
            'role_id' => 'required',
            'user_id' => 'required',
        ]);

        try {
            $userId = $request->user_id;
            $roleId = $request->role_id;
            $user = User::find($userId);
            $role = Role::find($roleId);

            $user->assignRole($role);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }

    public function editHasRole(Request $request)
    {
        $user = ModelHasRole::getHasRolebyModelId($request->id);
        return response()->json($user);
    }

    public function updateHasRole(Request $request)
    {

        $validated = $request->validate([
            'role_id' => 'required',
            'user_id' => 'required',
        ]);


        try {
            $userId = $request->user_id;
            $roleId = $request->role_id;
            $user = User::find($userId);
            $role = Role::find($roleId);

            $user->syncRoles([$role->name]);

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }
}
