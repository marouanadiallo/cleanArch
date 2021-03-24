<?php


namespace App\Domain\ArticlePort;

use App\Domain\ArticleDto\AddArticleResponse;

/**
 * Interface ArticlePresenterInterface
 * @package App\Domain\Article
 */
interface ArticlePresenterInterface
{
    public function presenter(AddArticleResponse $articleResponse);
}