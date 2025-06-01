<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Unit;

class UnitController extends Controller
{
    //
    public function index()
    {
        $pageTitle = 'All Units';
        $units = Unit::latest()->paginate(5);
        return view('unit.index', compact('pageTitle', 'units'));
    }

    public function store(Request $request, $id = 0)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('units', 'name')->ignore($id),
            ],
        ]);

        if ($id > 0) {
            // Update mode
            $unit = Unit::findOrFail($id);
            $message = 'Unit has been updated successfully';
            $status = $request->has('editcatstatus') ? 1 : 0;
        } else {
            // Create mode
            $unit = new Unit();
            $message = 'Unit has been created successfully';
            $status = $request->has('status') ? 1 : 0;
        }

        $unit->name = $request->name;
        $unit->status = $status;
        $unit->save();

        $notify[] = ['success', $message];
        return to_route('unit.index')->withNotify($notify);
    }

        public function delete($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        toastr()->error('Unit deleted successfully!');
        return redirect()->route('unit.index');
    }
}
