<?php

require "./models/admin.model.php";

class adminController extends controller{

    public function login(){
        if(isset($_POST['email']) && isset($_POST['password'])){
            $admin = new Admin();
            $admin = $admin->findBy("email",$_POST['email']);
            if($admin){
                if(password_verify($_POST['password'],$admin->password)){
                    $token = generateToken([
                        "id" => $admin->id,
                        "email" => $admin->email,
                    ]);
                    $responce = [
                        "state" => 200,
                        "msg" => "success",
                        "data" => [
                            "token" => $token
                        ]
                    ];
                    $_SESSION['id'] = $admin->id;
                    $_SESSION['email'] = $admin->email;
                }else{
                    $responce = [
                        "state" => 403,
                        "msg" => "Access denied! Wrong password",
                        "data" => []
                    ];
                }
            }else{
                $responce = [
                    "state" => 404,
                    "msg" => "No user found!",
                    "data" => []
                ];
            }
        }else{
            $responce = [
                "state" => 403,
                "msg" => "Access denied!",
                "data" => []
            ];
        }
        echo json_encode($responce);
    }

    public function verifyEmail($email){
        $admin = new Admin();
        $admin = $admin->findBy("email",$email);
        if($admin){
                $token = generateToken([
                    "id" => $admin->id,
                    "email" => $admin->email,
                ]);
                $responce = [
                    "state" => 200,
                    "msg" => "success",
                    "data" => []
                ];
        }else{
            $responce = [
                "state" => 404,
                "msg" => "Email not found",
                "data" => []
            ];
        }
        echo json_encode($responce);
    }

    public function resetPassword($token){
        if(isset($token)){
            $token = parceToken($token);
            if($token){
                $admin = new Admin();
                $admin = $admin->findBy("email",$token->email);
                if($admin){
                    $id = $admin->id;
                    if($_POST['password'] === $_POST['passwordconf']){
                        $admin = new Admin();
                        if($admin->update($id,["password" => password_hash($_POST['password'],PASSWORD_DEFAULT)])){
                            $responce = [
                                "state" => 200,
                                "msg" => "Password changed successfully!",
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
                            "state" => 403,
                            "msg" => "Password not match!",
                            "data" => []
                        ];
                    }
                    
                }else{
                    $responce = [
                        "state" => 404,
                        "msg" => "No user found with the given email adress!",
                        "data" => []
                    ];
                }
            }
        }else{
            $responce = [
                "state" => 403,
                "msg" => "Permition denied!",
                "data" => []
            ];
        }
        echo json_encode($responce);
    }
}