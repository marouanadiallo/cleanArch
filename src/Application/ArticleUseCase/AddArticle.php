<?php


namespace App\Application\ArticleUseCase;

use App\Domain\ArticleDto\AddArticleResponse;
use App\Domain\ArticlePort\ArticlePresenterInterface;
use App\Domain\ArticlePort\ArticleRepositoryInterface;
use App\Infrastructure\Entity\Article;

/**
 * Class AddArticle
 * @package App\Application\Article
 */
class AddArticle
{
    private ArticleRepositoryInterface $articleRepository;
    private AddArticleResponse $articleResponse;
    private ArticlePresenterInterface $articlePresenter;

    /**
     * AddArticle constructor.
     * @param ArticleRepositoryInterface $articleRepository
     * @param AddArticleResponse $response
     * @param ArticlePresenterInterface $articlePresenter
     */
    public function __construct(ArticleRepositoryInterface $articleRepository,
                                AddArticleResponse $response,
                                ArticlePresenterInterface $articlePresenter)
    {
        $this->articleRepository = $articleRepository;
        $this->articlePresenter = $articlePresenter;
        $this->articleResponse = $response;
    }


    /**
     * @param Article $article
     */
    public function execute(Article $article): void
    {
        if($this->isValid($article)){
            $this->articleRepository->save($article);
            $this->articlePresenter->presenter($this->articleResponse);
        }
    }

    /**
     * @param Article $article
     * @return bool
     */
    public function isValid(Article $article) :bool
    {
        $this->articleResponse->article->name = $article->getName();
        $this->articleResponse->article->price = $article->getPrice();
        return true;
    }
}