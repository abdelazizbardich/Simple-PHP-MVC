<?php

require "./models/article.model.php";
require "./models/comment.model.php";

class statisticsController extends controller{
    public function get(){
        $article = new Article();
        $comment = new Comment();
        $views = $article->getViewsCount();
        $comments = $comment->getCommentsCount();
        $articles = $article->getArticleCount();
        if(!$views || !$comments || $articles){
            $responce = [
                "state" => 500,
                "msg" => "Server error!",
                "data" => []
            ];
        }
        $responce = [
            "state" => 200,
            "msg" => "success",
            "data" => [
                "views" => $views[0],
                "comments" => $comments[0],
                "articles" => $articles[0]
            ]
        ];
        echo json_encode($responce);
    }
}