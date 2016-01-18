<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="requested_food")
 */

class Order
{
     /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    protected $date;

    /**
    * @var string
    * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    protected $user;

    /**
    * @var string
    * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    protected $primo;

    /**
     * @ORM\Column(type="string")
     */
    protected $secondo;

    /**
    * @var string
    * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    public $contorno;

    /**
    * @var string
    * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    protected $caffe;

    /**
    * @var string
    * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    protected $acqua;

    /**
    * @var string
    * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    protected $bibita;

    /**
    * @var string
    * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    protected $birra;

    /**
    * @var string
    * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    protected $totale;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Menu
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \Date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return Orders
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set primo
     *
     * @param string $primo
     *
     * @return Orders
     */
    public function setPrimo($primo)
    {
        $this->primo = $primo;

        return $this;
    }

    /**
     * Get primo
     *
     * @return string
     */
    public function getPrimo()
    {
        return $this->primo;
    }

    /**
     * Set secondo
     *
     * @param string $secondo
     *
     * @return Orders
     */
    public function setSecondo($secondo)
    {
        $this->secondo = $secondo;

        return $this;
    }

    /**
     * Get secondo
     *
     * @return string
     */
    public function getSecondo()
    {
        return $this->secondo;
    }

    /**
     * Set contorno
     *
     * @param string $contorno
     *
     * @return Orders
     */
    public function setContorno($contorno)
    {
        $this->contorno = $contorno;

        return $this;
    }

    /**
     * Get contorno
     *
     * @return string
     */
    public function getContorno()
    {
        return $this->contorno;
    }

    /**
     * Set caffe
     *
     * @param string $caffe
     *
     * @return Orders
     */
    public function setCaffe($caffe)
    {
        $this->caffe = $caffe;

        return $this;
    }

    /**
     * Get caffe
     *
     * @return string
     */
    public function getCaffe()
    {
        return $this->caffe;
    }

    /**
     * Set acqua
     *
     * @param string $acqua
     *
     * @return Orders
     */
    public function setAcqua($acqua)
    {
        $this->acqua = $acqua;

        return $this;
    }

    /**
     * Get acqua
     *
     * @return string
     */
    public function getAcqua()
    {
        return $this->acqua;
    }

    /**
     * Set bibita
     *
     * @param string $bibita
     *
     * @return Orders
     */
    public function setBibita($bibita)
    {
        $this->bibita = $bibita;

        return $this;
    }

    /**
     * Get bibita
     *
     * @return string
     */
    public function getBibita()
    {
        return $this->bibita;
    }

    /**
     * Set birra
     *
     * @param string $birra
     *
     * @return Orders
     */
    public function setBirra($birra)
    {
        $this->birra = $birra;

        return $this;
    }

    /**
     * Get birra
     *
     * @return string
     */
    public function getBirra()
    {
        return $this->birra;
    }

    /**
     * Set totale
     *
     * @param string $totale
     *
     * @return Orders
     */
    public function setTotale($totale)
    {
        $this->totale = $totale;

        return $this;
    }

    /**
     * Get totale
     *
     * @return string
     */
    public function getTotale()
    {
        return $this->totale;
    }

}
?>
