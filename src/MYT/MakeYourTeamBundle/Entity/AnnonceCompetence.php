<?php

namespace MYT\MakeYourTeamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnnonceCompetence
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MYT\MakeYourTeamBundle\Entity\AnnonceCompetenceRepository")
 */
class AnnonceCompetence
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=255)
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity="MYT\MakeYourTeamBundle\Entity\Annonce")
     * @ORM\JoinColumn(nullable=false)
     */
    private $annonce;

    /**
     * @ORM\ManyToOne(targetEntity="MYT\MakeYourTeamBundle\Entity\Competence")
     * @ORM\JoinColumn(nullable=false)
     */
    private $competence;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set niveau
     *
     * @param string $niveau
     * @return AnnonceCompetence
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set annonce
     *
     * @param \MYT\MakeYourTeamBundle\Entity\Annonce $annonce
     * @return AnnonceCompetence
     */
    public function setAnnonce(\MYT\MakeYourTeamBundle\Entity\Annonce $annonce)
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get annonce
     *
     * @return \MYT\MakeYourTeamBundle\Entity\Annonce 
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * Set competence
     *
     * @param \MYT\MakeYourTeamBundle\Entity\Competence $competence
     * @return AnnonceCompetence
     */
    public function setCompetence(\MYT\MakeYourTeamBundle\Entity\Competence $competence)
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * Get competence
     *
     * @return \MYT\MakeYourTeamBundle\Entity\Competence 
     */
    public function getCompetence()
    {
        return $this->competence;
    }
}
