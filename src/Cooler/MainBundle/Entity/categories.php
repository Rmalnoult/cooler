<?php

namespace Cooler\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * categories
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class categories
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cat_name", type="string", length=255)
     */
    private $catName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_mod", type="datetime")
     */
    private $lastMod;


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
     * Set catName
     *
     * @param string $catName
     * @return categories
     */
    public function setCatName($catName)
    {
        $this->catName = $catName;

        return $this;
    }

    /**
     * Get catName
     *
     * @return string 
     */
    public function getCatName()
    {
        return $this->catName;
    }

    /**
     * Set lastMod
     *
     * @param \DateTime $lastMod
     * @return categories
     */
    public function setLastMod($lastMod)
    {
        $this->lastMod = $lastMod;

        return $this;
    }

    /**
     * Get lastMod
     *
     * @return \DateTime 
     */
    public function getLastMod()
    {
        return $this->lastMod;
    }
}
