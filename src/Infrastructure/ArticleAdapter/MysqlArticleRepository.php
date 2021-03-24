<?php

namespace App\Infrastructure\ArticleAdapter;

use App\Domain\ArticlePort\ArticleRepositoryInterface;
use App\Infrastructure\Entity\Article;
use App\Infrastructure\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;

class MysqlArticleRepository implements ArticleRepositoryInterface
{
    private ArticleRepository $articleRepository;
    private EntityManagerInterface $em;

    /**
     * MysqlArticleRepository constructor.
     * @param ArticleRepository $articleRepository
     * @param EntityManagerInterface $em
     */
    public function __construct(ArticleRepository $articleRepository, EntityManagerInterface $em)
    {
        $this->articleRepository = $articleRepository;
        $this->em = $em;
    }


    public function save(Article $article)
    {
        $this->em->persist($article);
        $this->em->flush();
    }

    public function getById(int $id): Article
    {
        return $this->articleRepository->find($id);
    }
}