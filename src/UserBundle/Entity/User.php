<?php
// src/AppBundle/Entity/User.php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }


    /**
     * @ORM\OneToMany(targetEntity="\NormalUserBundle\Entity\Ticket", mappedBy="user")
     */
    private $ticket;



    /**
     * @ORM\OneToMany(targetEntity="\AdminBundle\Entity\Yetkiler", mappedBy="user")
     */
    private $yetki;




    /**
     * Add ticket
     *
     * @param \NormalUserBundle\Entity\Ticket $ticket
     * @return User
     */
    public function addTicket(\NormalUserBundle\Entity\Ticket $ticket)
    {
        $this->ticket[] = $ticket;
        return $this;
    }
    /**
     * Remove ticket
     *
     * @param \NormalUserBundle\Entity\Ticket $ticket
     */
    public function removeTicket(\NormalUserBundle\Entity\Ticket $ticket)
    {
        $this->ticket->removeElement($ticket);
    }
    /**
     * Get ticket
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTicket()
    {
        return $this->ticket;
    }




    /**
     * Add yetki
     *
     * @param \AdminBundle\Entity\Yetkiler $yetki
     * @return User
     */
    public function addYetki(\AdminBundle\Entity\Yetkiler $yetki)
    {
        $this->yetki[] = $yetki;
        return $this;
    }
    /**
     * Remove yetki
     *
     * @param \AdminBundle\Entity\Yetkiler $yetki
     */
    public function removeYetki(\AdminBundle\Entity\Yetkiler $yetki)
    {
        $this->yetki->removeElement($yetki);
    }
    /**
     * Get yetki
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getYetki()
    {
        return $this->yetki;
    }

}