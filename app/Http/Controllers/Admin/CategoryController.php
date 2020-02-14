<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:category-list|category-edit', ['only' => ['index']]);
        $this->middleware('permission:category-create', ['only' => ['index', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        try {
            $key = $request->input('key');
            $categories = Category::search($key);
            $totalCategory = $categories->count();
            $allCategories = Category::all();

            return view('admin.category.index', compact('categories', 'totalCategory', 'key', 'allCategories'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'status' => $request->input('status'),
            'icon' => $request->input('icon'),
            'slug' => str_slug($request->input('name')),
        ]);

        return redirect()->back()->with('success', __('messages.create-successfully'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $allCategories = Category::all();

        return view('admin.category.edit', compact('category', 'allCategories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'status' => $request->input('status'),
            'icon' => $request->input('icon'),
            'slug' => str_slug($request->input('name')),
            'updated_by' => Auth::user()->name,
        ]);

        return redirect()->route('list.category')->with('success', __('messages.update-successfully'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'deleted_by' => Auth::user()->name,
        ]);
        $category->delete();
        return redirect()->back()->with('success', __('messages.delete-successfully'));
    }
}