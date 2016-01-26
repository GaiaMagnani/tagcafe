<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class Utenti extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="firstname", type="string", length=50, nullable= true)
     */
    protected $firstname;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="lastname", type="string", length=50, nullable= true)
     */
    protected $lastname;


    //protected $email;

    //protected $password;


      /**
       * @var integer
       * @ORM\Column(name="credits", type="integer", nullable= true, options={"default"=0})
       */
    private $credits;


    public function __construct()
    {
      parent::__construct();
      $this->addRole("ROLE_OPER");
    }
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
         * Set firstname
         *
         * @param string $firstname
         *
         * @return Utenti
         */
        public function setFirstname($firstname)
        {
            $this->firstname = $firstname;

            return $this;
        }

        /**
         * Get firstname
         *
         * @return string
         */
        public function getFirstname()
        {
            return $this->firstname;
        }

        /**
         * Set lastname
         *
         * @param string $lastname
         *
         * @return Utenti
         */
        public function setLastname($lastname)
        {
            $this->lastname = $lastname;

            return $this;
        }

        /**
         * Get lastname
         *
         * @return string
         */
        public function getLastname()
        {
            return $this->lastname;
        }


        /**
         * Set credits
         *
         * @param string $credits
         *
         * @return Utenti
         */
        public function setCredits($credits)
        {
            $this->credits = $credits;

            return $this;
        }

        /**
         * Get credits
         *
         * @return string
         */
        public function getCredits()
        {
            return $this->credits;
        }

}
