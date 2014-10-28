<?php

namespace MYT\MakeYourTeamBundle\Controller;

use Doctrine\Common\Util\Debug;
use MYT\MakeYourTeamBundle\Entity\Annonce;
use MYT\MakeYourTeamBundle\Entity\AnnonceCompetence;
use MYT\MakeYourTeamBundle\Entity\Image;
use MYT\MakeYourTeamBundle\Form\AnnonceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnnonceController extends Controller
{

    public function addAction(Request $request)
    {
        $annonce = new Annonce();
        $form = $this->createForm(new AnnonceType(), $annonce);


        $_request = $this->getRequest();
        if($_request->getMethod() == 'POST'){

            $form->handleRequest($request);
            if($form->isValid()){
                $em = $this->getDoctrine()->getManager();

//                $categorieRepository = $em->getRepository("MakeYourTeamBundle:Categorie");
                $categorie = $form->get('categorie')->getData();

                $annonce->setCategorie($categorie)->setAuteur('Auteur');

                $image = $form->getData()->getImage();
                $image->preUpload();
                //Le persist pour l'image est exécuté en cascade

                $annonce->setAuteur("auteur");

                // On récupère toutes les compétences
                $listCompetence = $em->getRepository('MakeYourTeamBundle:Competence')->findAll();

                // Pour chaque compétence
                foreach ($listCompetence as $competence) {
                    // On crée une nouvelle « relation entre 1 annonce et 1 compétence »
                    $annonceCompetence = new AnnonceCompetence();
                    // On la lie à l'annonce, qui est ici toujours la même
                    $annonceCompetence->setAnnonce($annonce);
                    // On la lie à la compétence, qui change ici dans la boucle foreach
                    $annonceCompetence->setCompetence($competence);
                    $annonceCompetence->setNiveau('Expert');
                    $em->persist($annonceCompetence);
                }
                $em->persist($annonce);
                $em->flush();

                $image->upload();

                $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

                return $this->redirect($this->generateUrl('home'));

            }
        }
        return $this->render("MakeYourTeamBundle:Annonce:add.html.twig", array(
            'form' => $form->createView(),
        ));
    }

    public function editAction($annonce_id)
    {
        $annonce = $this->getDoctrine()->getManager()->getRepository('MakeYourTeamBundle:Annonce')->find($annonce_id);
        $formBuilder = $this->get('form.factory')->createBuilder('form', $annonce);

    }

    public function pageAction($page)
    {
        return $this->render("MakeYourTeamBundle:Annonce:page.html.twig", array(
            'page' => $page,
        ));
    }

    public function articleAction()
    {
        $article = array(
            'titre'   => 'Titre de l\'article',
            'date'    => new \DateTime(),
            'contenu' => 'Contenu ici.',
            'auteur'  => 'Eric Dampierre',
        );

        return $this->render("MakeYourTeamBundle:Annonce:article.html.twig", array(
            'article' => $article,
        ));
    }

}
