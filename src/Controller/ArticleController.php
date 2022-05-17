<?php

namespace Mvc\Controller;

use Config\Controller;
use Mvc\Model\ArticleModel;
use Twig\Environment;

class ArticleController extends Controller
{
    private ArticleModel $articleModel;

    public function __construct() {
        parent::__construct();
        $this->articleModel = new ArticleModel();
    }

    public function ArticleList() {
        $articles = $this->articleModel->ArticleList();
        echo $this->twig->render('articles.html.twig', ['articles' => $articles]);
    }


    public function createArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $from = $_FILES['image']['tmp_name'];
            $to = __DIR__ . '/../../public/images/' . $_FILES['image']['name'];
            if (move_uploaded_file($from, $to))
            {
                $this->articleModel->createArticle($_POST['title'], $_FILES['image']['name'], $_POST['place'], $_POST['date'], $_POST['bio']);
            }
            header('location: /');
            exit();
        }
        echo $this->twig->render('createArticle.html.twig');
    }

}