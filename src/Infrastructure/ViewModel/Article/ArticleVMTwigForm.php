<?php


namespace App\Infrastructure\ViewModel\Article;

use Symfony\Component\Form\FormView;

/**
 * Class ArticleVMTwigForm
 * @package App\Infrastructure\ViewModel\Article
 */
class ArticleVMTwigForm
{
    public FormView $articleForm;
    public string $labelSubmit;
}