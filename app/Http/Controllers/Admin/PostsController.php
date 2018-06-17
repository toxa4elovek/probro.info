<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Post\Category;
use App\Entity\Post\Post;
use App\Http\Requests\Cabinet\PostRequest;
use App\Http\Requests\Cabinet\PostUpdateRequest;
use App\Services\Admin\Post\SeoService;
use App\Services\Cabinet\PostService;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    private $service;
    private $seoService;

    public function __construct(PostService $service, SeoService $seoService)
    {
        $this->service    = $service;
        $this->seoService = $seoService;
    }

    public function index()
    {
        $posts = Post::with('owner')->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::defaultOrder()->withDepth()->get();

        return view('admin.posts.create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        try {
            $post = $this->service->save($request);

            return redirect()->route('admin.posts.show', compact('post'))
                ->with(['success' => 'Пост успешно сохранён']);
        } catch (\DomainException $e) {
            return back()->with(['error' => $e->getMessage()]);
        }

    }

    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }


    public function edit($id)
    {
        $categories = Category::defaultOrder()->withDepth()->get();
        $post       = Post::where('id', $id)->with('seo')->first();

        return view('admin.posts.edit', compact('post', 'categories'));
    }


    public function update(PostUpdateRequest $request, Post $post)
    {
        try {
            $this->service->update($request, $post);

            return redirect()->route('admin.posts.show', compact('post'))
                ->with('success', 'Пост успешно обновлён');
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function activate(Post $post)
    {
        try {
            $this->service->activate($post);

            return redirect()->route('admin.posts.index')
                ->with('success', 'Пост успешно опубликован');
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function moderate($id)
    {
        try {
            $this->service->moderate($id);

            return redirect()->route('admin.posts.index')
                ->with('success', 'Пост отправлен на модерацию');
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function draft(Post $post)
    {
        try {
            $this->service->moveToDraft($post);

            return redirect()->route('admin.posts.show', $post)
                ->with('success', 'Пост доступен для редактирования');
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Post $post)
    {
        $post->forceDelete();
    }
}
