<?php

namespace App\Http\Controllers\Cabinet;

use App\Entity\Post\Category;
use App\Entity\Post\Post;
use App\Http\Requests\Cabinet\PostRequest;
use App\Http\Requests\Cabinet\PostUpdateRequest;
use App\Services\Cabinet\PostService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    private $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $posts = Post::where('owner_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('cabinet.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::defaultOrder()->withDepth()->getModels();

        return view('cabinet.post.create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        $post = $this->service->save($request);

        return redirect()->route('post.show', ['slug' => $post->slug])
            ->with('success', 'Объявление успешно сохранено');
    }

    public function edit(Post $post)
    {
        $categories = Category::defaultOrder()->withDepth()->getModels();

        return view('cabinet.post.edit', compact('post', 'categories'));
    }


    public function update(PostUpdateRequest $request, Post $post)
    {
        try {
            $this->service->update($request, $post);

            return redirect()->route('cabinet.post.index')->with('success', __('tips.updatePostSuccess'));
        } catch (\DomainException $e) {
            return redirect()->route('cabinet.post.index')->with('error', $e->getMessage());
        }
    }

    public function destroy(Post $post)
    {
        if (!\Gate::allows('post-owner', $post)){
            abort(403);
        }

        try {
            $this->service->delete($post);

            return redirect()->route('cabinet.post.index')->with('success', 'Пост успешно удалён');
        } catch (\DomainException $e) {
            return redirect()->route('cabinet.post.index')->with('error', $e->getMessage());
        }
    }

    public function moderate(Post $post)
    {
        if (!\Gate::allows('post-owner', $post)){
            abort(403);
        }

        try {
            $this->service->moderate($post->id);

            return redirect()->route('cabinet.post.index')->with('success', "Пост отправлен на модерацию");
        } catch (\DomainException $e) {
            return redirect()->route('cabinet.post.index')->with('error', $e->getMessage());
        }
    }
}
