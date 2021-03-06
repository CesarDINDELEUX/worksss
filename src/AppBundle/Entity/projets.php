<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * projets
 *
 * @ORM\Table(name="projets")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\projetsRepository")
 */
class projets
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
     * @var int
     *
     * @ORM\Column(name="tailleMaxEquipe", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $tailleMaxEquipe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateDeFin", type="date")
     */
    private $dateDeFin;
    
    
    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Equipes", mappedBy="projet")
     */
    private $equipes;
    // ...

    public function __construct() {
        $this->equipes = new ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return projets
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set dateDeFin
     *
     * @param \DateTime $dateDeFin
     *
     * @return projets
     */
    public function setDateDeFin($dateDeFin)
    {
        $this->dateDeFin = $dateDeFin;

        return $this;
    }

    /**
     * Get dateDeFin
     *
     * @return \DateTime
     */
    public function getDateDeFin()
    {
        return $this->dateDeFin;
    }
    

    /**
     * Set tailleMaxEquipe
     *
     * @param integer $tailleMaxEquipe
     *
     * @return projets
     */
    public function setTailleMaxEquipe($tailleMaxEquipe)
    {
        $this->tailleMaxEquipe = $tailleMaxEquipe;

        return $this;
    }

    /**
     * Get tailleMaxEquipe
     *
     * @return integer
     */
    public function getTailleMaxEquipe()
    {
        return $this->tailleMaxEquipe;
    }

    /**
     * Add equipe
     *
     * @param \AppBundle\Entity\Equipes $equipe
     *
     * @return projets
     */
    public function addEquipe(\AppBundle\Entity\Equipes $equipe)
    {
        $this->equipes[] = $equipe;

        return $this;
    }

    /**
     * Remove equipe
     *
     * @param \AppBundle\Entity\Equipes $equipe
     */
    public function removeEquipe(\AppBundle\Entity\Equipes $equipe)
    {
        $this->equipes->removeElement($equipe);
    }

    /**
     * Get equipes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquipes()
    {
        return $this->equipes;
    }
}
