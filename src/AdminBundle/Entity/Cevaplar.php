<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cevaplar
 *
 * @ORM\Table(name="cevaplar")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\CevaplarRepository")
 */
class Cevaplar
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
     * @var string
     *
     * @ORM\Column(name="metin", type="string", length=255)
     */
    private $metin;


    /**
     * @ORM\ManyToOne(targetEntity="\NormalUserBundle\Entity\Ticket", inversedBy="cevaplar")
     * @ORM\JoinColumn(name="ticket_id", referencedColumnName="id")
     */
    private $ticket;


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
     * Set metin
     *
     * @param string $metin
     *
     * @return Cevaplar
     */
    public function setMetin($metin)
    {
        $this->metin = $metin;

        return $this;
    }

    /**
     * Get metin
     *
     * @return string
     */
    public function getMetin()
    {
        return $this->metin;
    }

    /**
     * Set ticket
     *
     * @param \NormalUserBundle\Entity\Ticket $ticket
     * @return Cevaplar
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

}

