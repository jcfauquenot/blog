<?php
// src/Controller/BlogController.php
// use Symfony\Component\Routing\Annotation\Route;
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/** @Route("/blog", name="blog_") */

class BlogController extends AbstractController
{
    /**
     * @Route("/show", name="index")
     * 
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }
    /**
     * @Route("/show/{page}", requirements={"page"="[a-z0-9\-]+"},
     * defaults = { "page":"Mon-Super-article"},
     * name="show")
     */
    public function show($page)
    {
        $page = ucwords(str_replace('-',' ',$page));

        return $this->render('show.html.twig', ['page' => $page]);
    }
}
