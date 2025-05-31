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
        return view('categories.index', compact('pageTitle','categories'));
    }   

    public function store(Request $request, $id = 0)
    {
        // dd($request->all());
        $request->validate([
            'name' => [
                'required',
                'string',
                Rule::unique('categories', 'name')->ignore($id),
            ],
        ]);


        if ($id > 0) {
            $category = Category::whereId($request->id)->first();
            $message = 'Category has been updated successfully';
            $givenStatus = isset($request->editcatstatus) ? 1 : 0;
        } else {
            $category = new Category();
            $message = 'Category has been created successfully';
            $givenStatus = isset($request->status) ? 1 : 0;
        }

        $category->name = $request->name;
        $category->status = $givenStatus;
        $category->save();

        $notify[] = ['success', $message];
        return to_route('category.index')->withNotify($notify);
    }

}
