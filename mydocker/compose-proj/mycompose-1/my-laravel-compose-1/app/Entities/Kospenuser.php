<?php

namespace Entity;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;


/**
 *@ORM\Entity
 *@ORM\Table(name="kospenusers")
 */
class Kospenuser
{
    use Timestamps;

    /**
     * @ORM\Version
     * @ORM\Column(type="integer")
     */
    private $version;

    /**
     *@ORM\Id
     *@ORM\Column(type="string")
     */
    protected $ic;

    /**
     * @ORM\OneToMany(targetEntity="Entity\Screening", mappedBy="kospenuser", cascade={"remove"})
     */
    protected $screenings;

    // /**
    //  *@Gedmo\Timestampable(on="create")
    //  *@ORM\Column(type="datetime")
    //  */
    // protected $created_at;
    //
    // /**
    //  *@Gedmo\Timestampable(on="update")
    //  *@ORM\Column(type="datetime")
    //  */
    // protected $updated_at;

    /**
     *@ORM\Column(type="string")
     */
    protected $name;


    // ------  WRONG!!!!!  ------ //
    // /**
    //  *@ORM\Column(name="fk_gender", type="integer", options={"unsigned"=true})
    //  */
    // protected $fk_gender;
    //
    // /**
    //  * @ORM\ManyToOne(targetEntity="Entity\Gender", inversedBy="kospenusers")
    //  * @ORM\JoinColumn(name="fk_gender", referencedColumnName="id")
    //  */
    // protected $rel_gender;

    // ------  WRONG!!!!!  ------ //
    // /**
    //  *@ORM\Column(name="fk_gender", type="integer")
    //  */
    // protected $fk_gender = null;

    /**
     * @ORM\ManyToOne(targetEntity="Entity\Gender", inversedBy="kospenusers")
     * @ORM\JoinColumn(name="fk_gender", referencedColumnName="id")
     */
    protected $rel_gender;

    /**
     *@ORM\Column(type="string")
     */
    protected $address;

    /**
     *@ORM\Column(name="firstRegRegion", type="string")
     */
    protected $firstRegRegion;


    // ------  WRONG!!!!!  ------ //
    // /**
    //  *@ORM\Column(name="fk_state", type="integer", options={"unsigned"=true})
    //  */
    // protected $fk_state;

    /**
     * @ORM\ManyToOne(targetEntity="Entity\State", inversedBy="kospenusers")
     * @ORM\JoinColumn(name="fk_state", referencedColumnName="id")
     */
    protected $rel_state;


    // ------  WRONG!!!!!  ------ //
    // /**
    //  *@ORM\Column(name="fk_region", type="integer", options={"unsigned"=true})
    //  */
    // protected $fk_region;

    /**
     * @ORM\ManyToOne(targetEntity="Entity\Region", inversedBy="kospenusers")
     * @ORM\JoinColumn(name="fk_region", referencedColumnName="id")
     */
    protected $rel_region;


    // ------  WRONG!!!!!  ------ //
    // /**
    //  *@ORM\Column(name="fk_subregion", type="integer", options={"unsigned"=true})
    //  */
    // protected $fk_subregion;

    /**
     * @ORM\ManyToOne(targetEntity="Entity\Subregion", inversedBy="kospenusers")
     * @ORM\JoinColumn(name="fk_subregion", referencedColumnName="id")
     */
    protected $rel_subregion;


    // ------  WRONG!!!!!  ------ //
    // /**
    //  *@ORM\Column(name="fk_locality", type="integer", options={"unsigned"=true})
    //  */
    // protected $fk_locality;

    /**
     * @ORM\ManyToOne(targetEntity="Entity\Locality", inversedBy="kospenusers")
     * @ORM\JoinColumn(name="fk_locality", referencedColumnName="id")
     */
    protected $rel_locality;


    /////////////////
    // Constructor //
    /////////////////
    public function _construct()
    {
      $this->screenings = new ArrayCollection;
    }


    /////////////////////
    // Getter & Setter //
    /////////////////////
    /**
     * Get the value of Ic
     *
     * @return mixed
     */
    public function getIc()
    {
        return $this->ic;
    }

    /**
     * Set the value of Ic
     *
     * @param mixed ic
     *
     * @return self
     */
    public function setIc($ic)
    {
        $this->ic = $ic;

        return $this;
    }

    /**
     * Get the value of Screenings
     *
     * @return mixed
     */
    public function getScreenings()
    {
        return $this->screenings;
    }

    /**
     * Set the value of Screenings
     *
     * @param mixed screenings
     *
     * @return self
     */
    public function setScreenings($screenings)
    {
        $this->screenings = $screenings;

        return $this;
    }

    /**
     * Get the value of Created At
     *
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of Created At
     *
     * @param mixed created_at
     *
     * @return self
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of Updated At
     *
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of Updated At
     *
     * @param mixed updated_at
     *
     * @return self
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

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

    /**
     * Get the value of Gender
     *
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of Gender
     *
     * @param mixed gender
     *
     * @return self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of Address
     *
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of Address
     *
     * @param mixed address
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of State
     *
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of State
     *
     * @param mixed state
     *
     * @return self
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of Region
     *
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set the value of Region
     *
     * @param mixed region
     *
     * @return self
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get the value of Subregion
     *
     * @return mixed
     */
    public function getSubregion()
    {
        return $this->subregion;
    }

    /**
     * Set the value of Subregion
     *
     * @param mixed subregion
     *
     * @return self
     */
    public function setSubregion($subregion)
    {
        $this->subregion = $subregion;

        return $this;
    }

    /**
     * Get the value of Locality
     *
     * @return mixed
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Set the value of Locality
     *
     * @param mixed locality
     *
     * @return self
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get the value of Address
     *
     * @return mixed
     */
    public function getFirstRegRegion()
    {
        return $this->firstRegRegion;
    }

    /**
     * Set the value of Address
     *
     * @param mixed address
     *
     * @return self
     */
    public function setFirstRegRegion($firstRegRegion)
    {
        $this->firstRegRegion = $firstRegRegion;

        return $this;
    }


    /**
     * Get the value of Version
     *
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set the value of Version
     *
     * @param mixed version
     *
     * @return self
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get the value of Fk Gender
     *
     * @return mixed
     */
    public function getFkGender()
    {
        return $this->fk_gender;
    }

    /**
     * Set the value of Fk Gender
     *
     * @param mixed fk_gender
     *
     * @return self
     */
    public function setFkGender($fk_gender)
    {
        $this->fk_gender = $fk_gender;

        return $this;
    }

    

    /**
     * Get the value of Rel Gender
     *
     * @return mixed
     */
    public function getRelGender()
    {
        return $this->rel_gender;
    }

    /**
     * Set the value of Rel Gender
     *
     * @param mixed rel_gender
     *
     * @return self
     */
    public function setRelGender($rel_gender)
    {
        $this->rel_gender = $rel_gender;

        return $this;
    }

    /**
     * Get the value of Rel State
     *
     * @return mixed
     */
    public function getRelState()
    {
        return $this->rel_state;
    }

    /**
     * Set the value of Rel State
     *
     * @param mixed rel_state
     *
     * @return self
     */
    public function setRelState($rel_state)
    {
        $this->rel_state = $rel_state;

        return $this;
    }



    /**
     * Get the value of Rel Region
     *
     * @return mixed
     */
    public function getRelRegion()
    {
        return $this->rel_region;
    }

    /**
     * Set the value of Rel Region
     *
     * @param mixed rel_region
     *
     * @return self
     */
    public function setRelRegion($rel_region)
    {
        $this->rel_region = $rel_region;

        return $this;
    }


    /**
     * Get the value of Rel Subregion
     *
     * @return mixed
     */
    public function getRelSubregion()
    {
        return $this->rel_subregion;
    }

    /**
     * Set the value of Rel Subregion
     *
     * @param mixed rel_subregion
     *
     * @return self
     */
    public function setRelSubregion($rel_subregion)
    {
        $this->rel_subregion = $rel_subregion;

        return $this;
    }


    /**
     * Get the value of Rel Locality
     *
     * @return mixed
     */
    public function getRelLocality()
    {
        return $this->rel_locality;
    }

    /**
     * Set the value of Rel Locality
     *
     * @param mixed rel_locality
     *
     * @return self
     */
    public function setRelLocality($rel_locality)
    {
        $this->rel_locality = $rel_locality;

        return $this;
    }

}
