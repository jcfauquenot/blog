<?php
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Entity\Category;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/** @Route("/blog", name="blog_") */

class BlogController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * 
     */
    public function index()
    {

        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAll();

        if (!$articles) {
            throw $this->createNotFoundException(
                'No article found in article\'s table.'
            );
        }

        return $this->render(
            'index.html.twig',
            ['articles' => $articles]
        );
    }

    /**
     * @Route("/show/{page}", requirements={"page"="[a-z0-9\-]+"},
     * defaults={"page" = null},
     * name="show")
     */
    public function show($page)
    {
        if (!$page) {
            throw $this->createNotFoundException('No slug has been sent to find an article in article\'s table.');
        }
        $page = preg_replace('/-/',' ',ucwords(trim(strip_tags($page)), "-"));

        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findOneBy(['title' => mb_strtolower($page)]);

        if (!$article) {
            throw $this->createNotFoundException(
                'No article with ' . $page . ' title, found in article\'s table.'
            );
        }

        return $this->render('showbyid.html.twig', [
            'article' => $article,
            'page' => $page,
            ]);
    }

    /**
     * @Route("/category/{category}", requirements={"category"="[a-z0-9\-]+"},
     * defaults={"category" = null},
     * name="show_category")
     */

    public function showByCategory($category)
    {
        var_dump($category);
       //  $limit = 3;

        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findByCategory($category, ['id' => 'DESC'] ); // $limit);
        return $this->render('category.html.twig', ['articles' => $articles, 'category' => $category,]);
    }
}
