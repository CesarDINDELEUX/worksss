<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * messages
 *
 * @ORM\Table(name="messages")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\messagesRepository")
 */
class messages
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
     * @ORM\Column(name="DateMessage", type="date")
     */
    private $dateMessage;

    /**
     * @var string
     *
     * @ORM\Column(name="Contenue", type="text")
     */
    private $contenue;
    
    
    
    
    
    
    


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
     * Set dateMessage
     *
     * @param \DateTime $dateMessage
     *
     * @return messages
     */
    public function setDateMessage($dateMessage)
    {
        $this->dateMessage = $dateMessage;

        return $this;
    }

    /**
     * Get dateMessage
     *
     * @return \DateTime
     */
    public function getDateMessage()
    {
        return $this->dateMessage;
    }

    /**
     * Set contenue
     *
     * @param string $contenue
     *
     * @return messages
     */
    public function setContenue($contenue)
    {
        $this->contenue = $contenue;

        return $this;
    }

    /**
     * Get contenue
     *
     * @return string
     */
    public function getContenue()
    {
        return $this->contenue;
    }
}

