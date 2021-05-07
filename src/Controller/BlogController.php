<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\ImageRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'blog')]
    public function index(): Response
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }


    
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        return $this->render('blog/home.html.twig');
        
    }


    #[Route('/photographie', name: 'photographie')]
    public function photographie(ArticleRepository $articleRepository ,ImageRepository $imageRepository): Response
    {
        return $this->render('blog/photographie.html.twig',[
            'Articles'=> $articleRepository-> LastFree(),
            'Images'=> $imageRepository-> Lastree()
        ]);
        
    }

    #[Route('/illustration', name: 'illustration')]
    public function illustration(): Response
    {
        return $this->render('blog/illustration.html.twig');
        
    }

    #[Route('/videographie', name: 'videographie')]
    public function videographie(): Response
    {
        return $this->render('blog/videographie.html.twig');
        
    }


    #[Route('/photo/{id}', name: 'photo_show')]
    public function photo_show($id): Response
    {
        $repo =$this->getDoctrine()->getRepository(Article::class);
        $article = $repo->find($id);
        return $this->render('blog/photo.html.twig',[
            'Articles'=> $article 
        ]);
        
    }


}
