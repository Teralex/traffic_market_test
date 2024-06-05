<?php

namespace App\Interfaces;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

interface ArticleRepositoryInterface
{
    public function all(array $columns) : Collection;

    public function create(array $data);

    public function update(array $data, $id) : Article;

    public function delete($id);

    public function find($id) : Article;
}
