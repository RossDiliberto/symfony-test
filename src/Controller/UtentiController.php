<?php
namespace App\Controller;

use App\Entity\Utenti;
use App\Entity\Gruppo;
use App\Form\GruppoType;
use App\Form\UtentiType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UtentiController extends AbstractController
{
    /**
     * @Route("/crea-utenti", name="crea-utenti")
     */
    public function crea_utenti(Request $request)
    {
        
        $utenti = new utenti();
      
        $form = $this->createForm(UtentiType::class,$utenti);

        $form->handleRequest($request);
  
        if($form->isSubmitted() && $form->isValid()) {
          $utenti = $form->getData();
  
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($utenti);
          $entityManager->flush();

          $this->addFlash('success', 'Utente aggiunto con successo!');
  
          return $this->redirectToRoute('prova-doctrine');
        }
        return $this->render('crea-utenti.html.twig',['form' => $form->createView()]);

    }

    /**
     * @Route("/crea-gruppo", name="crea-gruppo")
     */
    public function crea_gruppo(Request $request) {
        $gruppo = new Gruppo();
      
        $form = $this->createForm(GruppoType::class,$gruppo);
  
        $form->handleRequest($request);
  
        if($form->isSubmitted() && $form->isValid()) {
          $utenti = $form->getData();
  
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($gruppo);
          $entityManager->flush();

          $this->addFlash('success', 'Gruppo creato correttamente!');
          
        }
        return $this->render('crea-gruppo.html.twig',['form' => $form->createView()]);
    }

     /**
     * @Route("/prova-doctrine", name="prova-doctrine")
     */
    public function prova_doctrine() 
    {
        $utenti= $this->getDoctrine()->getRepository(Utenti::class)->findAll();
        return $this->render('prova-doctrine.html.twig', array('utenti' => $utenti));
    }

}