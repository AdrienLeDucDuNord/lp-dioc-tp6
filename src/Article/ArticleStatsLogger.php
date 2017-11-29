<?php

namespace App\Article;

use App\Entity\Article;
use App\Entity\ArticleStat;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class ArticleStatsLogger
{
    public function log(Article $article, string $action): void
    {
        // Créer un article stat et le persist.

    }
}
