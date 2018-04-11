<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Jetons
 *
 * @ORM\Table(name="jetons")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JetonsRepository")
 */
class Jetons
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
     * @ORM\Column(name="valeur", type="integer")
     */
    private $valeur;
    
    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Equipes", inversedBy="jetons")
     * @ORM\JoinColumn(name="equipes_id", referencedColumnName="id")
     */
    private $equipe;
    
    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Intervenants", inversedBy="jetons")
     * @ORM\JoinColumn(name="intervenant_id", referencedColumnName="id")
     */
    private $intervenant;


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
     * Set valeur
     *
     * @param integer $valeur
     *
     * @return Jetons
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return int
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set equipe
     *
     * @param \AppBundle\Entity\Equipes $equipe
     *
     * @return Jetons
     */
    public function setEquipe(\AppBundle\Entity\Equipes $equipe = null)
    {
        $this->equipe = $equipe;

        return $this;
    }

    /**
     * Get equipe
     *
     * @return \AppBundle\Entity\Equipes
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * Set intervenant
     *
     * @param \AppBundle\Entity\Intervenants $intervenant
     *
     * @return Jetons
     */
    public function setIntervenant(\AppBundle\Entity\Intervenants $intervenant = null)
    {
        $this->intervenant = $intervenant;

        return $this;
    }

    /**
     * Get intervenant
     *
     * @return \AppBundle\Entity\Intervenants
     */
    public function getIntervenant()
    {
        return $this->intervenant;
    }
}
