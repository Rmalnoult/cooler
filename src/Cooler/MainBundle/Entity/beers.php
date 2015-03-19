<?php

namespace Cooler\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * beers
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cooler\MainBundle\Entity\beersRepository")
 */
class beers
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
     * @ORM\Column(name="brewery_id", type="integer")
     */
    private $breweryId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="cat_id", type="integer")
     */
    private $catId;

    /**
     * @var integer
     *
     * @ORM\Column(name="style_id", type="integer")
     */
    private $styleId;

    /**
     * @var float
     *
     * @ORM\Column(name="abv", type="float")
     */
    private $abv;

    /**
     * @var float
     *
     * @ORM\Column(name="ibu", type="float")
     */
    private $ibu;

    /**
     * @var float
     *
     * @ORM\Column(name="srm", type="float")
     */
    private $srm;

    /**
     * @var integer
     *
     * @ORM\Column(name="upc", type="integer")
     */
    private $upc;

    /**
     * @var string
     *
     * @ORM\Column(name="filepath", type="string", length=255)
     */
    private $filepath;

    /**
     * @var string
     *
     * @ORM\Column(name="descript", type="text")
     */
    private $descript;

    /**
     * @var integer
     *
     * @ORM\Column(name="add_user", type="integer")
     */
    private $addUser;

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
     * Set breweryId
     *
     * @param integer $breweryId
     * @return beers
     */
    public function setBreweryId($breweryId)
    {
        $this->breweryId = $breweryId;

        return $this;
    }

    /**
     * Get breweryId
     *
     * @return integer 
     */
    public function getBreweryId()
    {
        return $this->breweryId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return beers
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set catId
     *
     * @param integer $catId
     * @return beers
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
     * Set styleId
     *
     * @param integer $styleId
     * @return beers
     */
    public function setStyleId($styleId)
    {
        $this->styleId = $styleId;

        return $this;
    }

    /**
     * Get styleId
     *
     * @return integer 
     */
    public function getStyleId()
    {
        return $this->styleId;
    }

    /**
     * Set abv
     *
     * @param float $abv
     * @return beers
     */
    public function setAbv($abv)
    {
        $this->abv = $abv;

        return $this;
    }

    /**
     * Get abv
     *
     * @return float 
     */
    public function getAbv()
    {
        return $this->abv;
    }

    /**
     * Set ibu
     *
     * @param float $ibu
     * @return beers
     */
    public function setIbu($ibu)
    {
        $this->ibu = $ibu;

        return $this;
    }

    /**
     * Get ibu
     *
     * @return float 
     */
    public function getIbu()
    {
        return $this->ibu;
    }

    /**
     * Set srm
     *
     * @param float $srm
     * @return beers
     */
    public function setSrm($srm)
    {
        $this->srm = $srm;

        return $this;
    }

    /**
     * Get srm
     *
     * @return float 
     */
    public function getSrm()
    {
        return $this->srm;
    }

    /**
     * Set upc
     *
     * @param integer $upc
     * @return beers
     */
    public function setUpc($upc)
    {
        $this->upc = $upc;

        return $this;
    }

    /**
     * Get upc
     *
     * @return integer 
     */
    public function getUpc()
    {
        return $this->upc;
    }

    /**
     * Set filepath
     *
     * @param string $filepath
     * @return beers
     */
    public function setFilepath($filepath)
    {
        $this->filepath = $filepath;

        return $this;
    }

    /**
     * Get filepath
     *
     * @return string 
     */
    public function getFilepath()
    {
        return $this->filepath;
    }

    /**
     * Set descript
     *
     * @param string $descript
     * @return beers
     */
    public function setDescript($descript)
    {
        $this->descript = $descript;

        return $this;
    }

    /**
     * Get descript
     *
     * @return string 
     */
    public function getDescript()
    {
        return $this->descript;
    }

    /**
     * Set addUser
     *
     * @param integer $addUser
     * @return beers
     */
    public function setAddUser($addUser)
    {
        $this->addUser = $addUser;

        return $this;
    }

    /**
     * Get addUser
     *
     * @return integer 
     */
    public function getAddUser()
    {
        return $this->addUser;
    }

    /**
     * Set lastMod
     *
     * @param \DateTime $lastMod
     * @return beers
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
