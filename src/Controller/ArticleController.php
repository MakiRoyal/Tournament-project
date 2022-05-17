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

}