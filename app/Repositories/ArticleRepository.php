<?php

namespace App\Repositories;

use App\Interfaces\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function all(array $columns) : Collection
    {
        return Article::all($columns);
    }

    public function create(array $data)
    {
        return Article::create($data);
    }

    public function update(array $data, $id) : Article
    {
        $article = Article::findOrFail($id);
        $article->update($data);
        return $article;
    }

    public function delete($id)
    {
        $user = Article::findOrFail($id);
        $user->delete();
    }

    public function find($id) : Article
    {
        return Article::findOrFail($id);
    }
}
