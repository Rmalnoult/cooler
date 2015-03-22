<?php

namespace Cooler\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * breweries_geocode
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class breweries_geocode
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
     * @ORM\OneToOne(targetEntity="Cooler\MainBundle\Entity\breweries", cascade={"persist"})
     */
    private $breweryId;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float")
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="accuracy", type="string", length=255)
     */
    private $accuracy;


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
     * @return breweries_geocode
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
     * Set latitude
     *
     * @param float $latitude
     * @return breweries_geocode
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return breweries_geocode
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set accuracy
     *
     * @param string $accuracy
     * @return breweries_geocode
     */
    public function setAccuracy($accuracy)
    {
        $this->accuracy = $accuracy;

        return $this;
    }

    /**
     * Get accuracy
     *
     * @return string 
     */
    public function getAccuracy()
    {
        return $this->accuracy;
    }
}
