<?php

namespace App\Controller;

use App\Entity\Inscrire;

use App\Entity\ArticleImage;

use App\Form\RegistrationType;
use App\Entity\Personnalisation;
use App\Form\ArticleImageType;
use App\Form\PersonnalisationType;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    #[Route('/connexion', name: 'security_connexion')]
    public function security_connexion(): Response
    {
        return $this->render('security/connexion.html.twig');
        
    }


    #[Route('/inscription', name: 'security_registration')]
    public function registration(Request $request, EntityManagerInterface $entityManagerInterface, UserPasswordEncoderInterface $encoder)
    {
        
        $inscrire = new Inscrire();
        $form =$this-> createForm(RegistrationType::class, $inscrire);

        $form-> handleRequest($request);
        if($form ->isSubmitted() && $form->isValid()){

            $hash = $encoder->encodePassword($inscrire, $inscrire-> getPassword());
            $inscrire->setPassword($hash);

            $entityManagerInterface->persist($inscrire);
            $entityManagerInterface->flush();
            $this->addFlash('info', "votre connexion a été effectué avec succès");
           return $this->redirectToRoute('security_connexion');
           
        }

        return $this->render('security/registration.html.twig',[
            'form'=> $form->createView()
        ]);     
    }

    #[Route('/personnalisation', name: 'personnalisation')]
    public function personnalisation(Request $request, EntityManagerInterface $entityManagerInterface)
    {
        $personnaliser = new Personnalisation();
        $form =$this-> createForm(PersonnalisationType::class, $personnaliser);

        $form-> handleRequest($request);
        if($form ->isSubmitted() && $form->isValid()){
            $entityManagerInterface->persist($personnaliser);
            $entityManagerInterface->flush();
            $this->addFlash('info', "votre message a été envoyé. Nous vous répondrons dans un délai de 48h");
        }

        return $this->render('security/personnalisation.html.twig',[
            'formPersonnaliser'=> $form->createView()
        ]);     
        
    }

    
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }


    

    
    
    
}
