<?php


namespace App\Infrastructure\Controller\Article;

use App\Application\ArticleUseCase\AddArticle;
use App\Application\ArticleUseCase\ShowArticle;
use App\Infrastructure\ArticleAdapter\ArticlePresenter;
use App\Infrastructure\ArticleAdapter\ArticlePresenterForm;
use App\Infrastructure\Entity\Article;
use App\Infrastructure\Form\Type\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ArticleController
 * @package App\Infrastructure\Controller\Article
 * @Route("/articles")
 */
class ArticleController extends AbstractController
{
    private Article $article;

    /**
     * ArticleController constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }


    /**
     * @param ArticlePresenterForm $presenterForTwig
     * @return Response
     * @Route("/create", name="articles_create")
     */
    public function formAddArticle(ArticlePresenterForm $presenterForTwig): Response
    {
        $articleForm = $this->createForm(ArticleType::class, $this->article, [
            'action'=>$this->generateUrl('article_add'),
            'method'=>'POST'
        ]);
        $presenterForTwig->presenter($articleForm);

        return $this->render('Article/new-article.html.twig', [
            "articleForm" => $presenterForTwig->getArticleView()
        ]);
    }

    /**
     * @param Request $request
     * @param AddArticle $addArticle
     * @param ArticlePresenter $articlePresenter
     * @return Response
     * @Route("/addArticle", name="article_add", methods={"POST"})
     */
    public function addArticle(Request  $request, AddArticle $addArticle, ArticlePresenter $articlePresenter): Response
    {
        $this->article->setName($request->get('article')["name"]);
        $this->article->setPrice($request->get('article')["price"]);
        $addArticle->execute($this->article);

        return $this->render('Article/show-article.html.twig', [
            "articleVM" => $articlePresenter->getArticleVMTwig()
        ]);
    }

    /**
     * @param int $id
     * @param ShowArticle $showArticle
     * @param ArticlePresenter $articlePresenter
     * @return Response
     * @Route ("/{id}", name="articles_show", methods={"GET"})
     */
    public function showArticle(int $id, ShowArticle $showArticle, ArticlePresenter $articlePresenter): Response
    {
        $showArticle->execute($id);
        return $this->render('Article/show-article.html.twig', [
            'articleVM' => $articlePresenter->getArticleVMTwig()
        ]);
    }
}