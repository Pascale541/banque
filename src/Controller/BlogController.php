<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    public function photographie(): Response
    {
        return $this->render('blog/photographie.html.twig');
        
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


    #[Route('/photo/12', name: 'photo_show')]
    public function photo_show(): Response
    {
        return $this->render('blog/photo.html.twig');
        
    }


}
