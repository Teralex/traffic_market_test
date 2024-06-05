<?php

namespace App\Http\Controllers;

use App\Http\Requests\AricleRequest;
use App\Services\ArticleService;
use Illuminate\Routing\Controller as BaseController;

class ArticlesController extends BaseController
{

    public function __construct(
        protected ArticleService $articleService
    ) {
    }

    public function getActiveArticles() : array
    {
        return $this->articleService->all(true);
    }

    public function getArticleById($id) : array
    {
        return $this->articleService->find($id);
    }

    public function changeArticleStatus(AricleRequest $request) : array
    {
        return $this->articleService->update(
            [
                'is_active' => $request->input('data.is_active')
            ],
            $request->input('data.id')
        );
    }
}
