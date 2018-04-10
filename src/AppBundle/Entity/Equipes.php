<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ManyToOne(targetEntity="projets", inversedBy="equipes")
     * @JoinColumn(name="projet_id", referencedColumnName="id")
     */
    private $projet;


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
}

