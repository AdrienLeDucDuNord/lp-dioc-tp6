<?php

namespace App\Article;

use App\Entity\Article;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class CountViewUpdater
{
    public function update(Article $article): void
    {
        $ts = new TokenStorage();
        if($ts->getToken()->getUser() != $article->getAuthor()){
            $article->setCountView(+1);
        }
    }
}
