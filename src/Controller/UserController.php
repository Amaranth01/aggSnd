<?php

namespace App\Controller;

use App\Entity\User;
use Cassandra\Type\UserType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/user')]
class UserController extends AbstractController
{

//    Route for a user
    #[Route('/', name: 'app_user')]
    public function index(): Response
    {
        return $this->render('user/addArticle.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

//    Route for the writers
    #[Route('/writer-space', name: 'writer_space')]
    public function writerSpace(): Response {
          //Secured for access
//        if(!in_array('ROLE_WRITER' 'ROLE_ADMIN', $this->getUser()->getRoles())) {
//            $this->render('home/addArticle.html.twig', [
//                'controller_name' => 'HomeController',
//            ]);
//        }
        return $this->render('user/writer.html.twig');
    }

    //    Route for the moderators
    #[Route('/modo-space', name: 'modo_space')]
    public function modoSpace(): Response {
        //Secured for access
//        if(!in_array('ROLE_MODO' || 'ROLE_ADMIN', $this->getUser()->getRoles())) {
//            $this->render('home/addArticle.html.twig', [
//                'controller_name' => 'HomeController',
//            ]);
//        }
        return $this->render('user/modo.html.twig');
    }
}
