<?php

namespace Entity;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="screenings")
 */
class Screening
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    protected $id;


    // ------  WRONG!!!!!  ------ //
    // /**
    //  * @ORM\Column(type="string")
    //  */
    // protected $fk_ic;

    /**
     * @ORM\ManyToOne(targetEntity="Entity\Kospenuser", inversedBy="screenings")
     * @ORM\JoinColumn(name="fk_ic", referencedColumnName="ic")
     */
    protected $kospenuser;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;

    /**
     * @ORM\Column(type="float")
     */
    protected $weight;

    /**
     * @ORM\Column(type="float")
     */
    protected $height;

    /**
     * @ORM\Column(type="integer")
     */
    protected $systolic;

    /**
     * @ORM\Column(type="integer")
     */
    protected $diastolic;

    /**
     * @ORM\Column(type="float")
     */
    protected $dxt;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $smoker;

    // /**
    //  * @ORM\Column(name="sendToServer", type="boolean")
    //  */
    // protected $sendToServer;



    /////////////////////
    // Getter & Setter //
    /////////////////////
    /**
     * Get the value of Ic
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Ic
     *
     * @param mixed ic
     *
     * @return self
     */
    public function setIc($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Fk Ic
     *
     * @return mixed
     */
    public function getFkIc()
    {
        return $this->fk_ic;
    }

    /**
     * Set the value of Fk Ic
     *
     * @param mixed fk_ic
     *
     * @return self
     */
    public function setFkIc($fk_ic)
    {
        $this->fk_ic = $fk_ic;

        return $this;
    }

    /**
     * Get the value of Kospenuser
     *
     * @return mixed
     */
    public function getKospenuser()
    {
        return $this->kospenuser;
    }

    /**
     * Set the value of Kospenuser
     *
     * @param mixed kospenuser
     *
     * @return self
     */
    public function setKospenuser($kospenuser)
    {
        $this->kospenuser = $kospenuser;

        return $this;
    }

    /**
     * Get the value of Date
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of Date
     *
     * @param mixed date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of Weight
     *
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set the value of Weight
     *
     * @param mixed weight
     *
     * @return self
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get the value of Height
     *
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set the value of Height
     *
     * @param mixed height
     *
     * @return self
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get the value of Systolic
     *
     * @return mixed
     */
    public function getSystolic()
    {
        return $this->systolic;
    }

    /**
     * Set the value of Systolic
     *
     * @param mixed systolic
     *
     * @return self
     */
    public function setSystolic($systolic)
    {
        $this->systolic = $systolic;

        return $this;
    }

    /**
     * Get the value of Diastolic
     *
     * @return mixed
     */
    public function getDiastolic()
    {
        return $this->diastolic;
    }

    /**
     * Set the value of Diastolic
     *
     * @param mixed diastolic
     *
     * @return self
     */
    public function setDiastolic($diastolic)
    {
        $this->diastolic = $diastolic;

        return $this;
    }

    /**
     * Get the value of Dxt
     *
     * @return mixed
     */
    public function getDxt()
    {
        return $this->dxt;
    }

    /**
     * Set the value of Dxt
     *
     * @param mixed dxt
     *
     * @return self
     */
    public function setDxt($dxt)
    {
        $this->dxt = $dxt;

        return $this;
    }

    /**
     * Get the value of Smoker
     *
     * @return mixed
     */
    public function getSmoker()
    {
        return $this->smoker;
    }

    /**
     * Set the value of Smoker
     *
     * @param mixed smoker
     *
     * @return self
     */
    public function setSmoker($smoker)
    {
        $this->smoker = $smoker;

        return $this;
    }

    // /**
    //  * Get the value of Send To Server
    //  *
    //  * @return mixed
    //  */
    // public function getSendToServer()
    // {
    //     return $this->sendToServer;
    // }
    //
    // /**
    //  * Set the value of Send To Server
    //  *
    //  * @param mixed sendToServer
    //  *
    //  * @return self
    //  */
    // public function setSendToServer($sendToServer)
    // {
    //     $this->sendToServer = $sendToServer;
    //
    //     return $this;
    // }

}
