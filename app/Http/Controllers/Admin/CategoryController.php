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
            $data = [
                'categories' => $categories,
                'totalCategory' => $totalCategory,
                'allCategories' => $allCategories,
                'key' => $key,
            ];
            return view('admin.category.index', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(CategoryRequest $request)
    {
        Category::create(
            array_merge($request->all(), [
                'slug' => str_slug($request->input('name')),
                'created_by' => Auth::user()->id,
            ])
        );

        return redirect()->back()->with('success', __('messages.create-successfully'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        if ($category->created_by != Auth::user()->id) {
            return redirect()->back()->with('error', __('messages.error'));
        }
        $allCategories = Category::all();

        return view('admin.category.edit', compact('category', 'allCategories'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update(
            array_merge($request->all(), [
                'slug' => str_slug($request->input('name')),
                'updated_by' => Auth::user()->id,
            ])
        );

        return redirect()->route('list.category')->with('success', __('messages.update-successfully'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->created_by != Auth::user()->id) {
            return redirect()->back()->with('error', __('messages.error'));
        }
        $category->update(['deleted_by' => Auth::user()->id]);
        $category->delete();

        return redirect()->back()->with('success', __('messages.delete-successfully'));
    }
}
