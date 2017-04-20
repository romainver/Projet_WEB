<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="appartient")
*/
class Appartient
{
  

    /**
     * @ORM\Id @ORM\Column(type="integer")
     */
    protected $Idclub;

    /**
     * @ORM\Id @ORM\Column(type="integer")
     */
    protected $Idutilisateur;

    /**
     * @ORM\Id @ORM\Column(type="string")
     */
    protected $Role;

    public function getRole()
    {
        return $this->Role;
    }

    public function setRole($Role)
    {
        $this->Role = $Role;
    }

    public function getIdclub()
    {
        return $this->Idclub;
    }

    public function setIdclub($Idclub)
    {
        $this->Idclub = $Idclub;
    }

    public function getIdutilisateur()
    {
        return $this->Idutilisateur;
    }

    public function setIdutilisateur($Idutilisateur)
    {
        $this->Idutilisateur = $Idutilisateur;
    }

}