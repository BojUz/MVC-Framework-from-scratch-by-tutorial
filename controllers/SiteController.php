<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function home()
    {

        $params = [
            'name' => "Bojo",
            'status' => " Razbra kvo se sluchva"
        ];

        return $this->render('home', $params);
    }

    public function contact(Request $request)
    {

        $contact = new ContactForm();
        $response = new Response();

        if($request->isPost()){
            $contact->loadData($request->getBody());
            //send da go dorazrabotq
            if($contact->validate())
            {
                if($contact->isSend()=='form')
                {
                    Application::$app->session->setFlash('success', 'Thanks for contacting us with contact form!');
                }
                else if($contact->isSend()=='form2')
                {
                    Application::$app->session->setFlash('success', 'Thanks for contacting us with form2!');
                }

                return $response->redirect('/contact');
            }
        }
        return $this->render('contact',
        ['model' => $contact]);
    }


}
