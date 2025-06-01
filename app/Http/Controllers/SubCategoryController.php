<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
{
    //
    public function index()
    {
        $pageTitle = 'All Subcategory';
        $categories = Category::latest()->paginate(5);
        $subcategories = SubCategory::with('category')->latest()->paginate(5);
        return view('sub-category.index', compact('pageTitle', 'categories', 'subcategories'));
    }
    public function store(Request $request, $id = 0)
    {
        $request->validate([
            'category_id',
            'name' => [
                'required',
                'string',
                Rule::unique('sub_categories', 'name')->ignore($id),
            ],
        ]);

        if ($id > 0) {
            // Update mode
            $subCategory = SubCategory::findOrFail($id);
            $message = 'Category has been updated successfully';
            $status = $request->has('editcatstatus') ? 1 : 0;
        } else {
            // Create mode
            $subCategory = new SubCategory();
            $message = 'Category has been created successfully';
            $status = $request->has('status') ? 1 : 0;
        }

        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->status = $status;
        $subCategory->save();

        $notify[] = ['success', $message];
        return to_route('subcategory.index')->withNotify($notify);
    }

        public function delete($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();

        toastr()->error('Subcategory deleted successfully!');
        return redirect()->route('subcategory.index');
    }
}
