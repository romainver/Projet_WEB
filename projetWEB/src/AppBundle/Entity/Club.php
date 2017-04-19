<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="club")
*/
class Club
{
  /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $Idclub;

    /**
     * @ORM\Column(type="string")
     */
    protected $Nomclub;

    /**
     * @ORM\Column(type="string")
     */
    protected $Descriptioncourte;

    /**
     * @ORM\Column(type="string")
     */
    protected $Descriptionlongue;

    /**
     * @ORM\Column(type="string")
     */
    protected $Photoclub;

    /**
     * @ORM\Column(type="integer")
     */
    protected $Budgetclub;


    public function getIdclub()
    {
        return $this->Idclub;
    }

    public function setIdclub($Idclub)
    {
        $this->Idclub = $Idclub;
    }

    public function getNomclub()
    {
        return $this->Nomclub;
    }

    public function setNomclub($Nomclub)
    {
        $this->Nomclub = $Nomclub;
    }

    public function getDescriptioncourte()
    {
        return $this->Descriptioncourte;
    }

    public function setDescriptioncourte($Descriptioncourte)
    {
        $this->Descriptioncourte = $Descriptioncourte;
    }

    public function getDescriptionlongue()
    {
        return $this->Descriptionlongue;
    }

    public function setDescriptionlongue($Descriptionlongue)
    {
        $this->Descriptionlongue = $Descriptionlongue;
    }

    public function getPhotoclub()
    {
        return $this->Photoclub;
    }

    public function setPhotoclub($Photoclub)
    {
        $this->Photoclub = $Photoclub;
    }

    public function getBudgetclub()
    {
        return $this->Budgetclub;
    }

    public function setBudgetclub($Budgetclub)
    {
        $this->Budgetclub = $Budgetclub;
    }
}