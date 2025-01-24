<?php

namespace App\Repository;

use App\Entity\Article;
use App\Db\Mysql;
use App\Tools\StringTools;

class ArticleRepository extends Repository
{

    public function findAll()
    {
        $query = $this->pdo->prepare("SELECT * FROM article");
        $query->execute();
        $articles = $query->fetchAll($this->pdo::FETCH_ASSOC);
        $articlesList = [];
        foreach ($articles as $article) {
            $articlesList[] = Article::createAndHydrate($article);
        }
        return $articlesList;
    }

    public function persist(Article $article)
    {

        if ($article->getId() !== null) {
            $query = $this->pdo->prepare(
                'UPDATE article SET title = :title, description = :description,  
                                                   WHERE id = :id'
            );
            $query->bindValue(':id', $article->getId(), $this->pdo::PARAM_INT);
        } else {
            $query = $this->pdo->prepare(
                'INSERT INTO article (title, descriptioin) 
                                                    VALUES (:title, :description)'
            );
        }

        $query->bindValue(':title', $article->getTitle(), $this->pdo::PARAM_STR);
        $query->bindValue(':description', $article->getdescription(), $this->pdo::PARAM_STR);

        return $query->execute();
    }
}
