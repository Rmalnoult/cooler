<?php

namespace Cooler\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * styles
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class styles
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
     * @var integer
     *
     * @ORM\Column(name="cat_id", type="integer")
     */
    private $catId;

    /**
     * @var string
     *
     * @ORM\Column(name="style_name", type="string", length=255)
     */
    private $styleName;

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
     * Set catId
     *
     * @param integer $catId
     * @return styles
     */
    public function setCatId($catId)
    {
        $this->catId = $catId;

        return $this;
    }

    /**
     * Get catId
     *
     * @return integer 
     */
    public function getCatId()
    {
        return $this->catId;
    }

    /**
     * Set styleName
     *
     * @param string $styleName
     * @return styles
     */
    public function setStyleName($styleName)
    {
        $this->styleName = $styleName;

        return $this;
    }

    /**
     * Get styleName
     *
     * @return string 
     */
    public function getStyleName()
    {
        return $this->styleName;
    }

    /**
     * Set lastMod
     *
     * @param \DateTime $lastMod
     * @return styles
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
