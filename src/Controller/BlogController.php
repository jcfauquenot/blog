<?php
// src/Controller/BlogController.php
// use Symfony\Component\Routing\Annotation\Route;
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog_index")
     * 
    */
    public function index()
    {
/*         return new Response(
            '<html><body>Blog Index</body></html>'
        ); */
        return $this->render('index.html.twig', [
            'owner' => 'Thomas',
    ]);
    }
}