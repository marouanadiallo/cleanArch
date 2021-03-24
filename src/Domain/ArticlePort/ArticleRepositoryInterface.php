<?php declare(strict_types=1);


namespace App\Domain\ArticlePort;


use App\Infrastructure\Entity\Article;

interface ArticleRepositoryInterface
{
    public function save(Article $article);
    public function getById(int $id): Article;
}