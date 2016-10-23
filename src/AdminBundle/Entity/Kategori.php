<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kategori
 *
 * @ORM\Table(name="kategori")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\KategoriRepository")
 */
class Kategori
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
     * @ORM\Column(name="kategori", type="string", length=255)
     */
    private $kategori;


    /**
     * @ORM\OneToMany(targetEntity="\AdminBundle\Entity\KategoriTicket", mappedBy="kategori")
     */
    private $kategoriticket;


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
     * Set kategori
     *
     * @param string $kategori
     *
     * @return Kategori
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
     * Add kategoriticket
     *
     * @param \AdminBundle\Entity\KategoriTicket $kategoriticket
     * @return Kategori
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

}

