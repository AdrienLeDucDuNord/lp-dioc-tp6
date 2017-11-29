<?php

namespace App\Controller;

use App\Article\CountViewUpdater;
use App\Article\NewArticleHandler;
use App\Article\UpdateArticleHandler;
use App\Article\ViewArticleHandler;
use App\Entity\Article;
use App\Form\ArticleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route(path="/article")
 */
class ArticleController extends Controller
{
    /**
     * @Route(path="/show/{slug}", name="article_show")
     */
    public function showAction(ViewArticleHandler $viewArticleHandler)
    {
        return $this->render('article/show.html.twig');
    }

    /**
     * @Route(path="/new", name="Article_new")
     */
    public function newAction(NewArticleHandler $newArticleHandler, Request $request)
    {
        // Seul les auteurs doivent avoir access.
        if($this->getUser()->isAuthor() == true){
            $article = new Article();
            $em = $this->getDoctrine()->getManager();
            $form = $this->createForm(ArticleType::class, $article);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid())
            {
                $newArticleHandler->handle($article);
                $em->persist($article);
                $em->flush();
            }
            return $this->render("Article/new.html.twig", array("form"=>$form->createView()));
        }
    }

    /**
     * @Route(path="/update/{slug}", name="article_update")
     */
    public function updateAction(UpdateArticleHandler $updateArticleHandler)
    {
        // Seul les auteurs doivent avoir access.
        if($this->getUser()->isAuthor() == true){
            return $this->render('Article/update.html.twig');
        }
        // Seul l'auteur de l'article peut le modifier
    }
}
