<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use DB;
use App\DataTables\roleDatatable;

class RoleController extends Controller
{
  
    public function storeRole(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'name' => 'required|max:100',
            ]);

            Role::create([
                'name' => $request->name,
            ]);
            return response()->json(['success' => 'تمت الاضافة بنجاح']);
        } catch (\exception $ex) {
            return response()->json(['error' => 'هناك خطا ما ,حاول لاحقا', 'err' => $ex]);
        }
    }


    //view datatable
    public function viewRoles(roleDatatable $dtable)
    {
        return $dtable->render('admin.roles.viewRole');
    }


    public function editRole(request $request)
    {
        $roles = Role::findOrFail($request->id);
        return response()->json($roles);
    }

    public function updateRole(request $request)
    {
        try {
            $data = Role::findOrFail($request->id);

            $request->validate([
                'name' => 'required|max:100',
            ]);

            $data->name = $request->name;
            $data->save();

            return response()->json(['success' => 'تم التحديث بنجاح']);
        } catch (\exception $ex) {
            return response()->json(['error', '  هناك خطا ما حاول لاحقا ']);
        }
    }


    public function deleteRole(request $request)
    {
        try {
            $delete = Role::findOrFail($request->id);

            $delete->delete();
            return response()->json(['success' => 'تم الحذف بنجاح']);
        } catch (\exception $ex) {
            return response()->json(['error' => 'هناك خطا ما يرجى المحاولة لاحقا']);
        }
    }
}
