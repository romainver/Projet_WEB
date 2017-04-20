<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="activite")
*/
class Activity
{
  /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $Idactivite;

    /**
     * @ORM\Column(type="string")
     */
    protected $Nomactivite;

    /**
     * @ORM\Column(type="string")
     */
    protected $Description;

    /**
     * @ORM\Column(type="date")
     */
    protected $Dateactivite;

    /**
     * @ORM\Column(type="integer")
     */
    protected $Votepour;

    /**
     * @ORM\Column(type="integer")
     */
    protected $Votecontre;

     /**
     * @ORM\Column(type="string")
     */
    protected $lienimage;


    public function getIdactivite()
    {
        return $this->Idactivite;
    }

    public function setIdactivite($Idactivite)
    {
        $this->Idactivite = $Idactivite;
    }

    public function getNomactivite()
    {
        return $this->Nomactivite;
    }

    public function setNomactivite($Nomactivite)
    {
        $this->Nomactivite = $Nomactivite;
    }

    public function getDescription()
    {
        return $this->Description;
    }

    public function setDescription($Description)
    {
        $this->Description = $Description;
    }

    public function getDateactivite()
    {
        return $this->Dateactivite;
    }

    public function setDateactivite($Dateactivite)
    {
        $this->Dateactivite = $Dateactivite;
    }

    public function getVotepour()
    {
        return $this->Votepour;
    }

    public function setVotepour($Votepour)
    {
        $this->Votepour = $Votepour;
    }

    public function getVotecontre()
    {
        return $this->Votecontre;
    }

    public function setVotecontre($Votecontre)
    {
        $this->Votecontre = $Votecontre;
    }

    public function getlienimage()
    {
        return $this->lienimage;
    }

    public function setlienimage($lienimage)
    {
        $this->lienimage = $lienimage;
    }
}