<?php declare(strict_types=1);


namespace App\Infrastructure\ArticleAdapter;


use App\Infrastructure\ViewModel\Article\ArticleVMTwigForm;
use Symfony\Component\Form\FormInterface;

/**
 * Class ArticlePresenterForm
 * @package App\Infrastructure\Adapter
 */
class ArticlePresenterForm
{
    private ArticleVMTwigForm $articleView;
    public function presenter(FormInterface $form, string $btnLabel="Ajouter")
    {
       $this->articleView = new ArticleVMTwigForm();
       $this->articleView->articleForm = $form->createView();
       $this->articleView->labelSubmit = $btnLabel;
    }

    /**
     * @return ArticleVMTwigForm
     */
    public function getArticleView(): ArticleVMTwigForm
    {
        return $this->articleView;
    }


}