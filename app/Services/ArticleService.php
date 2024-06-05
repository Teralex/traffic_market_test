<?php

namespace App\Services;

use App\Interfaces\ArticleRepositoryInterface;

class ArticleService
{
    const ALLOWED_COLUMNS = [
        'title',
        'content_short',
        'is_active',
        'created_at'
    ];

    public function __construct(
        protected ArticleRepositoryInterface $articleRepository
    ) {
    }

    public function create(array $data)
    {
        return $this->articleRepository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->articleRepository->update($data, $id)->toArray();
    }

    public function delete($id)
    {
        return $this->articleRepository->delete($id);
    }

    public function all(bool $exclude_inactive = false)
    {
        $articles = $this->articleRepository->all(self::ALLOWED_COLUMNS);
        if ($exclude_inactive){
            $articles = $articles->where("is_active", true);
        }
        return $articles->toArray();
    }

    public function find($id)
    {
        return $this->articleRepository->find($id)->toArray();
    }
}
