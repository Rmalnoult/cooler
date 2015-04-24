<?php
// src/Acme/UserBundle/Entity/User.php

namespace Cooler\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Cooler\MainBundle\Entity\beers;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="Cooler\MainBundle\Entity\beers", inversedBy="users")
     * @ORM\JoinTable(name="users_beers")
     * @ORM\OrderBy({"name" = "ASC"})
     **/
    protected $beers;


    public function __construct()
    {
        parent::__construct();
        $this->beers = new ArrayCollection();
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
     * Add beers
     *
     * @param \Cooler\MainBundle\Entity\beers $beers
     * @return User
     */
    public function addBeer(\Cooler\MainBundle\Entity\beers $beers)
    {
        $this->beers[] = $beers;

        return $this;
    }

    /**
     * Remove beers
     *
     * @param \Cooler\MainBundle\Entity\beers $beers
     */
    public function removeBeer(\Cooler\MainBundle\Entity\beers $beers)
    {
        $this->beers->removeElement($beers);
    }

    /**
     * Get beers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBeers()
    {
        return $this->beers;
    }
}
