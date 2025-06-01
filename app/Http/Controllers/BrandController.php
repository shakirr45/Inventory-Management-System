<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Validation\Rule;
class BrandController extends Controller
{
    //
        public function index()
    {
        $pageTitle = 'All Brands';
        $brands = Brand::latest()->paginate(5);
        return view('brand.index', compact('pageTitle', 'brands'));
    }

    public function store(Request $request, $id = 0)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('categories', 'name')->ignore($id),
            ],
        ]);

        if ($id > 0) {
            // Update mode
            $brand = Brand::findOrFail($id);
            $message = 'Brand has been updated successfully';
            $status = $request->has('editcatstatus') ? 1 : 0;
        } else {
            // Create mode
            $brand = new Brand();
            $message = 'Brand has been created successfully';
            $status = $request->has('status') ? 1 : 0;
        }

        $brand->name = $request->name;
        $brand->status = $status;
        $brand->save();

        $notify[] = ['success', $message];
        return to_route('brand.index')->withNotify($notify);
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        toastr()->error('Brand deleted successfully!');
        return redirect()->route('brand.index');
    }
}
