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
     * @ORM\ManyToOne(targetEntity="\UserBundle\Entity\User", inversedBy="ticket")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $tarih;


    /**
     * @ORM\OneToMany(targetEntity="\AdminBundle\Entity\KategoriTicket", mappedBy="ticket")
     */
    private $kategoriticket;


    /**
     * @var string
     *
     * @ORM\Column(name="durum", type="string", length=255)
     */
    private $durum;


    /**
     * @ORM\OneToMany(targetEntity="\AdminBundle\Entity\Yetkiler", mappedBy="ticket")
     */
    private $yetki;

    /**
     * @ORM\OneToMany(targetEntity="\AdminBundle\Entity\Cevaplar", mappedBy="ticket")
     */
    private $cevaplar;

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



    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     * @return Ticket
     */
    public function setUser(\UserBundle\Entity\User $user = null)
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


    /**
     * Set tarih
     *
     * @param \DateTime $tarih
     * @return Ticket
     */
    public function setTarih($tarih)
    {
        $this->tarih = $tarih;
        return $this;
    }
    /**
     * Get tarih
     *
     * @return \DateTime
     */
    public function getTarih()
    {
        return $this->tarih;
    }





    /**
     * Add kategoriticket
     *
     * @param \AdminBundle\Entity\KategoriTicket $kategoriticket
     * @return Ticket
     */
    public function addKategoriticket(\AdminBundle\Entity\KategoriTicket $kategoriticket)
    {
        $this->kategoriticket[] = $kategoriticket;
        return $this;
    }
    /**
     * Remove kategoriticket
     *
     * @param \AdminBundle\Entity\KategoriTicket $kategoriticket
     */
    public function removeKategoriticket(\AdminBundle\Entity\KategoriTicket $kategoriticket)
    {
        $this->kategoriticket->removeElement($kategoriticket);
    }
    /**
     * Get kategoriticket
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKategoriticket()
    {
        return $this->kategoriticket;
    }


    /**
     * Set durum
     *
     * @param string $durum
     *
     * @return Ticket
     */
    public function setDurum($durum)
    {
        $this->durum = $durum;

        return $this;
    }

    /**
     * Get durum
     *
     * @return string
     */
    public function getDurum()
    {
        return $this->durum;
    }




    /**
     * Add yetki
     *
     * @param \AdminBundle\Entity\Yetkiler $yetki
     * @return Ticket
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


    /**
     * Add cevaplar
     *
     * @param \AdminBundle\Entity\Cevaplar $cevaplar
     * @return Ticket
     */
    public function addTicket(\AdminBundle\Entity\Cevaplar $cevaplar)
    {
        $this->cevaplar[] = $cevaplar;
        return $this;
    }
    /**
     * Remove cevaplar
     *
     * @param \AdminBundle\Entity\Cevaplar $cevaplar
     */
    public function removeCevaplar(\AdminBundle\Entity\Cevaplar $cevaplar)
    {
        $this->cevaplar->removeElement($cevaplar);
    }
    /**
     * Get cevaplar
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCevaplar()
    {
        return $this->cevaplar;
    }


}

