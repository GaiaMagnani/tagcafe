<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="menu")
 */
class Menu
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
    private $date;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $primiOne;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $primiTwo;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $primiThree;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $secondOne;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $secondTwo;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $secondThree;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sideOne;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sideTwo;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sideThree;

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
     * Set primiOne
     *
     * @param string $primiOne
     *
     * @return Menu
     */
    public function setPrimiOne($primiOne)
    {
        $this->primiOne = $primiOne;

        return $this;
    }
    /**
     * Get primiOne
     *
     * @return string
     */
    public function getPrimiOne()
    {
        return $this->primiOne;
    }

    /**
     * Set primiTwo
     *
     * @param string $primiTwo
     *
     * @return Menu
     */
    public function setPrimiTwo($primiTwo)
    {
        $this->primiTwo = $primiTwo;

        return $this;
    }
    /**
     * Get primiTwo
     *
     * @return string
     */
    public function getPrimiTwo()
    {
        return $this->primiTwo;
    }

    /**
     * Set primiThree
     *
     * @param string $primiThree
     *
     * @return Menu
     */
    public function setPrimiThree($primiThree)
    {
        $this->primiThree = $primiThree;

        return $this;
    }
    /**
     * Get primiThree
     *
     * @return string
     */
    public function getPrimiThree()
    {
        return $this->primiThree;
    }

    /**
     * Set secondOne
     *
     * @param string $secondOne
     *
     * @return Menu
     */
    public function setSecondOne($secondOne)
    {
        $this->secondOne = $secondOne;

        return $this;
    }
    /**
     * Get secondOne
     *
     * @return string
     */
    public function getSecondOne()
      {
            return $this->secondOne;
      }

      /**
       * Set secondTwo
       *
       * @param string $secondTwo
       *
       * @return Menu
       */
      public function setSecondTwo($secondTwo)
      {
          $this->secondTwo = $secondTwo;

          return $this;
      }
      /**
       * Get secondTwo
       *
       * @return string
       */
        public function getSecondTwo()
        {
            return $this->secondTwo;
        }

        /**
         * Set secondThree
         *
         * @param string $secondThree
         *
         * @return Menu
         */
        public function setSecondThree($secondThree)
        {
            $this->secondThree = $secondThree;

            return $this;
        }
        /**
         * Get secondThree
         *
         * @return string
         */
        public function getSecondThree()
        {
            return $this->secondThree;
        }

        /**
         * Set sideOne
         *
         * @param string $sideOne
         *
         * @return Menu
         */
        public function setSideOne($sideOne)
        {
            $this->sideOne = $sideOne;

            return $this;
        }
        /**
         * Get sideOne
         *
         * @return string
         */
        public function getSideOne()
          {
                return $this->sideOne;
          }

          /**
           * Set sideTwo
           *
           * @param string $sideTwo
           *
           * @return Menu
           */
          public function setSideTwo($sideTwo)
          {
              $this->sideTwo = $sideTwo;

              return $this;
          }
          /**
           * Get sideTwo
           *
           * @return string
           */
            public function getSideTwo()
            {
                return $this->sideTwo;
            }

            /**
             * Set sideThree
             *
             * @param string $sideThree
             *
             * @return Menu
             */
            public function setSideThree($sideThree)
            {
                $this->sideThree = $sideThree;

                return $this;
            }
            /**
             * Get sideThree
             *
             * @return string
             */
            public function getSideThree()
            {
                return $this->sideThree;
            }




}
?>
