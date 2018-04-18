<?php

namespace Entity;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="subregions")
 */
class Subregion
{
    /**
     *  @ORM\Id
     *  @ORM\GeneratedValue
     *  @ORM\Column(type="integer", options={"unsigned"=true})
     */
    protected $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="Entity\Kospenuser", mappedBy="rel_subregion")
     */
    protected $kospenusers;

    /////////////////
    // Constructor //
    /////////////////
    public function _construct()
    {
        $this->kospenusers = new ArrayCollection;
    }

    /////////////////////
    // Getter & Setter //
    /////////////////////
    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Kospenusers
     *
     * @return mixed
     */
    public function getKospenusers()
    {
        return $this->kospenusers;
    }

    /**
     * Set the value of Kospenusers
     *
     * @param mixed kospenusers
     *
     * @return self
     */
    public function setKospenusers($kospenusers)
    {
        $this->kospenusers = $kospenusers;

        return $this;
    }

    /**
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of Name
     *
     * @param mixed name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }



}
