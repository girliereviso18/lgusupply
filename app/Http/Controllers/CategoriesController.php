<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::get();
        return view('Categories.index', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $Categorysave = new Category();
        $Categorysave->category_name = $request->category_name;

        if ($Categorysave->save()) {
            return redirect()->route('admin.categories.index')->withErrors('Successfully added!');
        }
    }

    public function addcategories()
    {
        return view('Categories.Store.index');
    }

    public function editcategories(Request $request)
    {
        $category = Category::where('id', $request->id)->first();

        return view('Categories.Edit.index', [
            'category' => $category
        ]);
    }

    public function updatecategories(Request $request)
    {
        $EditCategory = Category::where('id', $request->id)->first();
        $EditCategory->category_name = $request->category_name;

        if ($EditCategory->update()) {
            return redirect()->route('admin.categories.index')->withErrors('Updated!');
        }
    }

    public function deletecategories(Request $request)
    {
        $Deletesave = Category::where('id', $request->id)->first();

        if ($Deletesave->delete()) {
            return redirect()->back()->withErrors('Deleted!');
        }
    }
}
