<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Intervenants
 *
 * @ORM\Table(name="intervenants")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IntervenantsRepository")
 */
class Intervenants extends User
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="specialites", inversedBy="intervenants")
     * @ORM\JoinTable(name="intervenants_specialites")
     */
    private $specialites;
    
        /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Jetons", mappedBy="intervenant")
     */
    private $jetons;
    
    
    
    

    public function __construct() {
        $this->specialites = new \Doctrine\Common\Collections\ArrayCollection();
        $this->jetons = new ArrayCollection();
    }
    
    
    
    
    
    

    /**
     * Add specialite
     *
     * @param \AppBundle\Entity\specialites $specialite
     *
     * @return Intervenants
     */
    public function addSpecialite(\AppBundle\Entity\specialites $specialite)
    {
        $this->specialites[] = $specialite;

        return $this;
    }

    /**
     * Remove specialite
     *
     * @param \AppBundle\Entity\specialites $specialite
     */
    public function removeSpecialite(\AppBundle\Entity\specialites $specialite)
    {
        $this->specialites->removeElement($specialite);
    }

    /**
     * Get specialites
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSpecialites()
    {
        return $this->specialites;
    }

    /**
     * Add jeton
     *
     * @param \AppBundle\Entity\Jetons $jeton
     *
     * @return Intervenants
     */
    public function addJeton(\AppBundle\Entity\Jetons $jeton)
    {
        $this->jetons[] = $jeton;

        return $this;
    }

    /**
     * Remove jeton
     *
     * @param \AppBundle\Entity\Jetons $jeton
     */
    public function removeJeton(\AppBundle\Entity\Jetons $jeton)
    {
        $this->jetons->removeElement($jeton);
    }

    /**
     * Get jetons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJetons()
    {
        return $this->jetons;
    }
}
