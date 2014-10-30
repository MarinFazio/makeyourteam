<?php

namespace MYT\MakeYourTeamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Annonce
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MYT\MakeYourTeamBundle\Entity\AnnonceRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Annonce
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
     * @ORM\Column(name="titre", type="string", length=255)
     * @Assert\Length(min=4,message="Le titre doit faire au moins {{ limit }} caractères.")
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     * @Assert\NotBlank()
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity="MYT\MakeYourTeamBundle\Entity\Categorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published=true;

    /**
     * @ORM\OneToOne(targetEntity="MYT\MakeYourTeamBundle\Entity\Image", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=255)
     */
    private $auteur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mdate", type="datetime")
     * @Assert\DateTime()
     */
    private $mdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cdate", type="datetime")
     */
    private $cdate;

    /**
     * @Gedmo\Slug(fields={"titre"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;


    public function __construct()
    {
        $this->mdate = new \DateTime();
        $this->cdate = new \DateTime();
    }

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
     * Set titre
     *
     * @param string $titre
     * @return Annonce
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Annonce
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    
    /**
     * Set mdate
     *
     * @param \DateTime $mdate
     * @return Annonce
     */
    public function setMdate($mdate)
    {
        $this->mdate = $mdate;

        return $this;
    }

    /**
     * Get mdate
     *
     * @return \DateTime 
     */
    public function getMdate()
    {
        return $this->mdate;
    }

    /**
     * Set cdate
     *
     * @param \DateTime $cdate
     * @return Annonce
     */
    public function setCdate($cdate)
    {
        $this->cdate = $cdate;

        return $this;
    }

    /**
     * Get cdate
     *
     * @return \DateTime 
     */
    public function getCdate()
    {
        return $this->cdate;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return Annonce
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set image
     *
     * @param \MYT\MakeYourTeamBundle\Entity\Image $image
     * @return Annonce
     */
    public function setImage(Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \MYT\MakeYourTeamBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->setMdate(new \DateTime());
    }

    /**
     * @ORM\PrePersist
     */
    public function createDate()
    {
        $this->setMdate(new \DateTime());
        $this->setCdate(new \DateTime());
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Annonce
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     * @return Annonce
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return string 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set categorie
     *
     * @param \MYT\MakeYourTeamBundle\Entity\Categorie $categorie
     * @return Annonce
     */
    public function setCategorie(Categorie $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \MYT\MakeYourTeamBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}
