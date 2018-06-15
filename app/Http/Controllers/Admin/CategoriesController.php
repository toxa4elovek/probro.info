<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Post\Category;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::defaultOrder()->withDepth()->with('posts')->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = $this->getParents();

        return view('admin.categories.create', compact('parents'));
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request['name'],
            'slug' => $request['slug'] ? $request['slug'] : str_slug($request['name']),
            'parent_id' => $request['parent']
        ]);

        return redirect()->route('admin.category.show', $category)->with('success', 'Категория создана');
    }


    public function show(Category $category)
    {
        $children = $category->children;

        return view('admin.categories.show', compact('category', 'children'));
    }

    public function edit(Category $category)
    {
        $parents = $this->getParents();

        return view('admin.categories.update', compact('category', 'parents'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'parent_id' => $request['parent']
        ]);

        return redirect()->route('admin.category.show', $category);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.category.index');
    }

    /**
     * @return Category[]
     */
    private function getParents(): array
    {
        return Category::defaultOrder()->withDepth()->getModels();
    }
}
