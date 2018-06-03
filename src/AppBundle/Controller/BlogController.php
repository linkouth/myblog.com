<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $navigation = array(
            'home', 'About me', 'Projects', 'Contact'
        );
        $header = array(
            'speciality' => 'Web-developer',
            'name' => 'Barsik Keksov'
        );
        return $this->render('blog.html.twig', array($navigation, $header));
    }
}
