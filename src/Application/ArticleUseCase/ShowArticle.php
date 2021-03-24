<?php declare(strict_types=1);


namespace App\Application\ArticleUseCase;


use App\Domain\ArticleDto\AddArticleResponse;
use App\Domain\ArticlePort\ArticlePresenterInterface;
use App\Domain\ArticlePort\ArticleRepositoryInterface;

class ShowArticle
{
    private ArticleRepositoryInterface $articleRepository;
    private AddArticleResponse $articleResponse;
    private ArticlePresenterInterface $articlePresenter;

    /**
     * ShowArticle constructor.
     * @param ArticleRepositoryInterface $articleRepository
     * @param AddArticleResponse $articleResponse
     * @param ArticlePresenterInterface $articlePresenter
     */
    public function __construct(ArticleRepositoryInterface $articleRepository,
                                AddArticleResponse $articleResponse,
                                ArticlePresenterInterface $articlePresenter)
    {
        $this->articleRepository = $articleRepository;
        $this->articleResponse = $articleResponse;
        $this->articlePresenter = $articlePresenter;
    }


    public function execute(int $id): void
    {
        $article = $this->articleRepository->getById($id);
        if($article){
            $this->articleResponse->article->name = $article->getName();
            $this->articleResponse->article->price = $article->getPrice();

            $this->articlePresenter->presenter($this->articleResponse);
        }
    }
}