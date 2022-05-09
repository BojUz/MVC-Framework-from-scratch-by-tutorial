<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;
use app\core\middlewares\AuthMiddleware;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()){
            $loginForm->loadData($request->getBody());
            if($loginForm->validate() && $loginForm->login())
            {
                $response->redirect('/');
                //Application::$app->login();
                return;
            }
        }
        $this->setLayout('auth');

        return $this->render('login',[
            'model' => $loginForm
        ]);
    }
    public function register(Request $request)
    {

        $user = new User();
        if ($request->isPost()) {

            $user->loadData($request->getBody());
           
            // var_dump($registerModel);
            
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering!');
                Application::$app->response->redirect('/');
                exit;
            }
           // var_dump($registerModel->errors);
            return $this->render('register', ['model' => $user]);
        }
        $this->setLayout('auth');
        
        return $this->render('register', ['model' => $user]);
    }

    public function logout(Request $request,Response $response)
    {
        Application::$app->logOut();
        $response->redirect('/');
    }

    public function profile()
    {
        //Application::$app->view
        return $this->render('profile');
    }


}
