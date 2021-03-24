<?php


namespace App\Infrastructure\ArticleAdapter;


use App\Domain\ArticleDto\AddArticleResponse;
use App\Domain\ArticlePort\ArticlePresenterInterface;
use App\Infrastructure\ViewModel\Article\ArticleVMTwig;

class ArticlePresenter implements ArticlePresenterInterface
{
    private ArticleVMTwig $articleVMTwig;

    public function presenter(AddArticleResponse $articleResponse)
    {
        $this->articleVMTwig = new ArticleVMTwig();
        $this->articleVMTwig->article = $articleResponse->article;
        $this->articleVMTwig->errors = $articleResponse->errors;
    }

    /**
     * @return ArticleVMTwig
     */
    public function getArticleVMTwig(): ArticleVMTwig
    {
        return $this->articleVMTwig;
    }


}