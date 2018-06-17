<?php

namespace App\Http\Controllers\Admin\Post;

use App\Entity\Post\Post;
use App\Http\Requests\Admin\Post\SeoRequest;
use App\Services\Admin\Post\SeoService;
use App\Http\Controllers\Controller;

class SeoController extends Controller
{

    private $service;

    public function __construct(SeoService $service)
    {
        $this->service = $service;
    }


    public function update(SeoRequest $request, Post $post)
    {
        try {
            $this->service->update($request, $post);

            return redirect()->route('admin.posts.show', compact('post'))
                ->with('success', 'Сео успешно обновлено');
        } catch (\DomainException $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
