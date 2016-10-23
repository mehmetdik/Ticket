<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Yetkiler
 *
 * @ORM\Table(name="yetkiler")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\YetkilerRepository")
 */
class Yetkiler
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
     * @ORM\ManyToOne(targetEntity="\NormalUserBundle\Entity\Ticket", inversedBy="yetki")
     * @ORM\JoinColumn(name="ticket_id", referencedColumnName="id")
     */
    private $ticket;


    /**
     * @ORM\ManyToOne(targetEntity="\UserBundle\Entity\User", inversedBy="yetki")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


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
     * Set ticket
     *
     * @param \NormalUserBundle\Entity\Ticket $ticket
     * @return Yetkiler
     */
    public function setTicket(\NormalUserBundle\Entity\Ticket $ticket = null)
    {
        $this->ticket = $ticket;
        return $this;
    }
    /**
     * Get ticket
     *
     * @return \NormalUserBundle\Entity\Ticket
     */
    public function getTicket()
    {
        return $this->ticket;
    }




    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     * @return Yetkiler
     */
    public function setUser(\UserBundle\Entity\User $user= null)
    {
        $this->user = $user;
        return $this;
    }
    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

}

