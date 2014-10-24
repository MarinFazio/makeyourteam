<?php

namespace MYT\MakeYourTeamBundle\Controller;

use MYT\MakeYourTeamBundle\Entity\Annonce;
use MYT\MakeYourTeamBundle\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PublicController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $annonceRepository = $em->getRepository('MakeYourTeamBundle:Annonce');

//        $annonce = $annonceRepository->find(8);

//        $listCompetenceAnnonce = $em->getRepository("MakeYourTeamBundle:AnnonceCompetence")->findBy(array('annonce' => $annonce));

        $annonces = $annonceRepository->findAll();



        return $this->render("MakeYourTeamBundle:Public:index.html.twig", array(
            'annonces'               => $annonces,
//            'listCompetenceAnnonce' => $listCompetenceAnnonce,
        ));
    }


}
