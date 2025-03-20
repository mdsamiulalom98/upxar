<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Material;

class MaterialController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:material-list|material-create|material-edit|material-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:material-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:material-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:material-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $show_data = Material::orderBy('name', 'ASC')->get();
        return view('backEnd.material.index', compact('show_data'));
    }
    public function create()
    {
        return view('backEnd.material.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);

        $input = $request->all();

        Material::create($input);

        Toastr::success('Success', 'Data insert successfully');
        return redirect()->route('materials.index');
    }

    public function edit($id)
    {
        $edit_data = Material::find($id);
        return view('backEnd.material.edit', compact('edit_data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
        ]);
        // image one
        $update_data = Material::find($request->id);
        $input = $request->all();
        $update_data->update($input);

        Toastr::success('Success', 'Data update successfully');
        return redirect()->route('materials.index');
    }

    public function inactive(Request $request)
    {
        $inactive = Material::find($request->hidden_id);
        $inactive->status = 0;
        $inactive->save();
        Toastr::success('Success', 'Data inactive successfully');
        return redirect()->back();
    }
    public function active(Request $request)
    {
        $active = Material::find($request->hidden_id);
        $active->status = 1;
        $active->save();
        Toastr::success('Success', 'Data active successfully');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $delete_data = Material::find($request->hidden_id);
        $delete_data->delete();
        Toastr::success('Success', 'Data delete successfully');
        return redirect()->back();
    }
}
