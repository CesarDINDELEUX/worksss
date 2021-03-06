<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\User;
use AppBundle\Entity\projets;

/**
 * Equipes
 *
 * @ORM\Table(name="equipes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EquipesRepository")
 */
class Equipes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreation", type="date")
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="NomEquipe", type="string", length=255)
     */
    private $nomEquipe;
    
    
    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="projets", inversedBy="equipes")
     * @ORM\JoinColumn(name="projet_id", referencedColumnName="id")
     */
    private $projet;
    
  
    /**
     * @var int
     *
     * @ORM\Column(name="valeur", type="integer")
     */
    private $teemps;
    
    /**
     * Many Groups have Many Users.
     * @ORM\ManyToMany(targetEntity="Etudiants", mappedBy="equipes")
     */
    private $etudiants;

    public function __construct() {
        $this->etudiants = new \Doctrine\Common\Collections\ArrayCollection();
        
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Equipes
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set nomEquipe
     *
     * @param string $nomEquipe
     *
     * @return Equipes
     */
    public function setNomEquipe($nomEquipe)
    {
        $this->nomEquipe = $nomEquipe;

        return $this;
    }

    /**
     * Get nomEquipe
     *
     * @return string
     */
    public function getNomEquipe()
    {
        return $this->nomEquipe;
    }

    /**
     * Set projet
     *
     * @param \AppBundle\Entity\projets $projet
     *
     * @return Equipes
     */
    public function setProjet(\AppBundle\Entity\projets $projet = null)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \AppBundle\Entity\projets
     */
    public function getProjet()
    {
        return $this->projet;
    }

    

    

    /**
     * Add etudiant
     *
     * @param \AppBundle\Entity\Etudiants $etudiant
     *
     * @return Equipes
     */
    public function addEtudiant(\AppBundle\Entity\Etudiants $etudiant)
    {
        $this->etudiants[] = $etudiant;

        return $this;
    }

    /**
     * Remove etudiant
     *
     * @param \AppBundle\Entity\Etudiants $etudiant
     */
    public function removeEtudiant(\AppBundle\Entity\Etudiants $etudiant)
    {
        $this->etudiants->removeElement($etudiant);
    }

    /**
     * Get etudiants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtudiants()
    {
        return $this->etudiants;
    }

    /**
     * Set teemps
     *
     * @param integer $teemps
     *
     * @return Equipes
     */
    public function setTeemps($teemps)
    {
        $this->teemps = $teemps;

        return $this;
    }

    /**
     * Get teemps
     *
     * @return integer
     */
    public function getTeemps()
    {
        return $this->teemps;
    }
}
