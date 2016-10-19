<?php

namespace NormalUserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket")
 * @ORM\Entity(repositoryClass="NormalUserBundle\Repository\TicketRepository")
 */
class Ticket
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
     * @ORM\Column(name="baslik", type="string", length=255)
     */
    private $baslik;

    /**
     * @var string
     *
     * @ORM\Column(name="metin", type="string", length=255)
     */
    private $metin;

    /**
     * @var string
     *
     * @ORM\Column(name="kategori", type="string", length=255)
     */
    private $kategori;

    /**
     * @var string
     *
     * @ORM\Column(name="onemDerecesi", type="string", length=255)
     */
    private $onemDerecesi;

    /**
     * @var string
     *
     * @ORM\Column(name="dosya", type="string", length=255)
     */
    private $dosya;


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
     * Set baslik
     *
     * @param string $baslik
     *
     * @return Ticket
     */
    public function setBaslik($baslik)
    {
        $this->baslik = $baslik;

        return $this;
    }

    /**
     * Get baslik
     *
     * @return string
     */
    public function getBaslik()
    {
        return $this->baslik;
    }

    /**
     * Set metin
     *
     * @param string $metin
     *
     * @return Ticket
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
     * Set kategori
     *
     * @param string $kategori
     *
     * @return Ticket
     */
    public function setKategori($kategori)
    {
        $this->kategori = $kategori;

        return $this;
    }

    /**
     * Get kategori
     *
     * @return string
     */
    public function getKategori()
    {
        return $this->kategori;
    }

    /**
     * Set onemDerecesi
     *
     * @param string $onemDerecesi
     *
     * @return Ticket
     */
    public function setOnemDerecesi($onemDerecesi)
    {
        $this->onemDerecesi = $onemDerecesi;

        return $this;
    }

    /**
     * Get onemDerecesi
     *
     * @return string
     */
    public function getOnemDerecesi()
    {
        return $this->onemDerecesi;
    }

    /**
     * Set dosya
     *
     * @param string $dosya
     *
     * @return Ticket
     */
    public function setDosya($dosya)
    {
        $this->dosya = $dosya;

        return $this;
    }

    /**
     * Get dosya
     *
     * @return string
     */
    public function getDosya()
    {
        return $this->dosya;
    }
}

