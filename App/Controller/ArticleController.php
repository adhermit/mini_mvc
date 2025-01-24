<?php

namespace App\Controller;

use App\Repository\ArticleRepository;

class ArticleController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'list':
                        //charger controleur home
                        $this->list();
                        break;
                    default:
                        throw new \Exception("Cette action n'existe pas : " . $_GET['action']);
                        break;
                }
            } else {
                throw new \Exception("Aucune action détectée");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    public function list()
    {
        $articleRepository = new ArticleRepository();
        $articles = $articleRepository->findAll();
        $this->render('article/list', [
            'articles' => $articles
        ]);
    }
}
