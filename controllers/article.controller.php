<?php

require "./models/article.model.php";

class articleController extends controller{

    public function add(){
            if(!empty($_POST['title']) || !empty($_POST['slug']) || !empty($_POST['content'])){
                $model = new Article();
                $insert = $model->insert([
                    "title" => $_POST['title'],
                    "slug" => $_POST['slug'],
                    "content" => $_POST['content'],
                    "admin_id" => $_SESSION['id']
                ]);
                if($insert && is_int($insert)){
                    $responce = [
                        "state" => 200,
                        "msg" => "success",
                        "data" => [
                            "id" => $insert,
                            "title" => $_POST['title'],
                            "slug" => $_POST['slug'],
                            "content" => $_POST['content']
                        ]
                    ];
                }else{
                    $responce = [
                        "state" => 500,
                        "msg" => "Server error!",
                        "data" => []
                    ];
                }
            }else{
                $responce = [
                    "state" => 401,
                    "msg" => "permition denied!",
                    "data" => ["qcsdc" => $_POST]
                ];
            }
        echo json_encode($responce);
    }
    public function update($id){
            if(!empty($_POST['title']) || !empty($_POST['slug']) || !empty($_POST['content'])){
                $model = new Article();
                $update = $model->update($id,[
                    "title" => $_POST['title'],
                    "slug" => $_POST['slug'],
                    "content" => $_POST['content'],
                ]);
                if($update){
                    $responce = [
                        "state" => 200,
                        "msg" => "success",
                        "data" => [
                        ]
                    ];
                }else{
                    $responce = [
                        "state" => 500,
                        "msg" => "Server error!",
                        "data" => []
                    ];
                }
            }else{
                $responce = [
                    "state" => 401,
                    "msg" => "permition denied!",
                    "data" => []
                ];
            }
        echo json_encode($responce);
    }
    // delete
    public function delete($id){
        if(!empty($id)){
            $model = new Article();
            $delete = $model->delete($id);
            if($delete){
                $responce = [
                    "state" => 200,
                    "msg" => "success",
                    "data" => []
                ];
            }else{
                $responce = [
                    "state" => 500,
                    "msg" => "Server error!",
                    "data" => []
                ];
            }
        }else{
            $responce = [
                "state" => 401,
                "msg" => "permition denied!",
                "data" => []
            ];
        }
        echo json_encode($responce);
    }

    // find
    public function find($id){
            if(!empty($id)){
                $model = new Article();
                $result = $model->find($id);
                if($result){
                    $model = new Article();
                    $update = $model->update($result->id,[
                        "views" => ++$result->views,
                    ]);
                    $responce = [
                        "state" => 200,
                        "msg" => "success",
                        "data" => $result
                    ];
                }else{
                    $responce = [
                        "state" => 500,
                        "msg" => "Server error!",
                        "data" => []
                    ];
                }
            }else{
                $responce = [
                    "state" => 401,
                    "msg" => "permition denied!",
                    "data" => []
                ];
            }
        echo json_encode($responce);
    }

    // get all
    public function get(){
        $model = new Article();
        // $comments = new Comment();
        $result = $model->get();
        // $commentsCount = $comments->getCount();
        if($result){
            $responce = [
                "state" => 200,
                "msg" => "success",
                "data" => $result
            ];
        }else{
            $responce = [
                "state" => 500,
                "msg" => "Server error!",
                "data" => []
            ];
        }
        echo json_encode($responce);
    }
}