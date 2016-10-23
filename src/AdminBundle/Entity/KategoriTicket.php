<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KategoriTicket
 *
 * @ORM\Table(name="kategori_ticket")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\KategoriTicketRepository")
 */
class KategoriTicket
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
     * @ORM\ManyToOne(targetEntity="\NormalUserBundle\Entity\Ticket", inversedBy="kategoriticket")
     * @ORM\JoinColumn(name="ticket_id", referencedColumnName="id")
     */
    private $ticket;




    /**
     * @ORM\ManyToOne(targetEntity="\AdminBundle\Entity\Kategori", inversedBy="kategoriticket")
     * @ORM\JoinColumn(name="kategori_id", referencedColumnName="id")
     */
    private $kategori;


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
     * @return KategoriTicket
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
     * Set kategori
     *
     * @param \AdminBundle\Entity\Kategori $kategori
     * @return KategoriTicket
     */
    public function setKategori(\AdminBundle\Entity\Kategori $kategori = null)
    {
        $this->kategori = $kategori;
        return $this;
    }
    /**
     * Get kategori
     *
     * @return \AdminBundle\Entity\Kategori
     */
    public function getKategori()
    {
        return $this->kategori;
    }


}

