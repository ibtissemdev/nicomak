<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ObjectManager;
use App\Entity\UserRemerciements;
use App\Form\RemerciementType;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig' );
    }


    /**
     * @Route("/remerciements", name="defautlt_remerciements")
     */
    public function remerciements()

    {//Récupération des entrées des remerciements
        $lesRemerciements = $this->getDoctrine()->getRepository(UserRemerciements::class)->findAll(); //Récupérer une collection d'objets
//Objet complexe donc je prends que ce qui est nécessaire 
$equipe=[];

foreach ($lesRemerciements as $remer){//Je parcours l'objet $lesRemerciements, je stocke chaque élément dont j'ai besoin dans un nouveau tableau 
$liste=[];
$liste["membre"]= $remer->getMembre();
$liste["raison_remerciement"]= $remer->getRaisonRemerciement();
$liste["membre_remercie"]= $remer->getMembreRemercie();
$liste["date"]= $remer->getDateRemerciement();
$equipe[]=$liste;
}
// error_log(print_r($equipe,1))  ;

        return $this->render('default/remerciements.html.twig', [
            'remerciements' => $equipe, //j'envoie la variable $equipe pour la traiter dans twig
        ]);
    }

    /**
     * @Route("/remercier", name="defautlt_remercier")
     */
    public function remercier(Request $request): Response
    {//Traitement du formulaire 
        $userRemerciements = new UserRemerciements();
        $form = $this->createForm(RemerciementType::class, $userRemerciements);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {//Si le formulaire est soumis et qu'il est valide
            $em = $this->getDoctrine()->getManager();
            $em->persist($userRemerciements);
            $em->flush();//sauvegarder dans la bdd

            return $this->redirectToRoute('defautlt_remerciements'); //Redirection vers la page d'accueil après l'envoi du formulaire
        }

        return $this->render('default/remercier.html.twig', [
            "formulaire" => $form->createView() //Création de la vue du formulaire
        ]);
    }
}
