<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="participe")
*/
class Participe
{
  /**
     * @ORM\Id @ORM\Column(type="integer")
     */
    protected $Idutilisateur;

    /**
     * @ORM\Id @ORM\Column(type="integer")
     */
    protected $Idactivite;

    public function getIdutilisateur()
    {
        return $this->Idutilisateur;
    }

    public function setIdutilisateur($Idutilisateur)
    {
        $this->Idutilisateur = $Idutilisateur;
    }

    public function getIdactivite()
    {
        return $this->Idactivite;
    }

    public function setIdactivite($Idactivite)
    {
        $this->Idactivite = $Idactivite;
    }

}