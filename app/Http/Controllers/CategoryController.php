<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $pageTitle = 'All Categories';
        $categories = Category::latest()->paginate(5);
        return view('category.index', compact('pageTitle', 'categories'));
    }

    public function store(Request $request, $id = 0)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('categories', 'name')->ignore($id),
            ],
            'status' => 'required',
        ]);

        if ($id > 0) {
            // Update mode
            $category = Category::findOrFail($id);
            $message = 'Category has been updated successfully';
        } else {
            // Create mode
            $category = new Category();
            $message = 'Category has been created successfully';
        }

        $category->name = $request->name;
        $category->status = $request->status; 
        $category->save();

        $notify[] = ['success', $message];
        return to_route('category.index')->withNotify($notify);
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        toastr()->error('Category deleted successfully!');
        return redirect()->route('category.index');
    }
}
