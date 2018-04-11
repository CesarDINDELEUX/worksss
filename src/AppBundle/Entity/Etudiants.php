<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Etudiants
 *
 * @ORM\Table(name="etudiants")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtudiantsRepository")
 */
class Etudiants Extends User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    
    
    
    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="Equipes", inversedBy="etudiants")
     * @ORM\JoinTable(name="etudiants_equipes")
     */
    private $equipes;

    public function __construct() {
        $this->equipes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add equipe
     *
     * @param \AppBundle\Entity\Equipes $equipe
     *
     * @return Etudiants
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
