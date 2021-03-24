<?php


namespace App\Infrastructure\ViewModel\Article;


use App\Domain\ArticleDto\ArticleDto;

class ArticleVMTwig
{
    public ArticleDto $article;
    public array $errors;

}