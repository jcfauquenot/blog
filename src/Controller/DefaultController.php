<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     * 
     */
    public function index()
    {
        /*   return new Response(
            '<html><body>Blog Index</body></html>'
        ); */
        return $this->render('default.html.twig');
    }
}
