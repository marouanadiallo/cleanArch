<?php


namespace App\Domain\ArticleDto;

/**
 * Class AddArticleResponse
 * @package App\Domain\ArticleDto
 */
class AddArticleResponse
{
    public ArticleDto $article;
    public array $errors = [];

    /**
     * AddArticleResponse constructor.
     * @param ArticleDto $article
     */
    public function __construct(ArticleDto $article)
    {
        $this->article = $article;
    }


}