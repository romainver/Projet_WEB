<?php
namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity()
* @ORM\Table(name="utilisateur")
*/
class User
{
  /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $Idutilisateur;

    /**
     * @ORM\Column(type="string")
     */
    protected $Nom;

    /**
     * @ORM\Column(type="string")
     */
    protected $Prenom;

    /**
     * @ORM\Column(type="string")
     */
    protected $Age;

    /**
     * @ORM\Column(type="integer")
     */
    protected $Promotion;

    /**
     * @ORM\Column(type="string")
     */
    protected $Phrasechoc;

    /**
     * @ORM\Column(type="string")
     */
    protected $Avatar;

    /**
     * @ORM\Column(type="string")
     */
    protected $Email;

    /**
     * @ORM\Column(type="string")
     */
    protected $Motdepasse;

    /**
     * @ORM\Column(type="string")
     */
    protected $Categorie;

    public function getIdUtilisateur()
    {
        return $this->Idutilisateur;
    }

    public function setIdUtilisateur($Idutilisateur)
    {
        $this->IdUtilisateur = $Idutilisateur;
    }

    public function getNom()
    {
        return $this->Nom;
    }

    public function setNom($Nom)
    {
        $this->Nom = $Nom;
    }

    public function getPrenom()
    {
        return $this->Prenom;
    }

    public function setPrenom($Prenom)
    {
        $this->Prenom = $Prenom;
    }

    public function getAge()
    {
        return $this->Age;
    }

    public function setAge($Age)
    {
        $this->Age = $Age;
    }

    public function getPromotion()
    {
        return $this->Promotion;
    }

    public function setPromotion($Promotion)
    {
        $this->Promotion = $Promotion;
    }

    public function getPhraseChoc()
    {
        return $this->Phrasechoc;
    }

    public function setPhraseChoc($Phrasechoc)
    {
        $this->Phrasechoc = $Phrasechoc;
    }

    public function getAvatar()
    {
        return $this->Avatar;
    }

    public function setAvatar($Avatar)
    {
        $this->Avatar = $Avatar;
    }

    public function getEmail()
    {
        return $this->Email;
    }

    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    public function getMotdepasse()
    {
        return $this->Motdepasse;
    }

    public function setMotdepasse($Motdepasse)
    {
        $this->Motdepasse = $Motdepasse;
    }

    public function getCategorie()
    {
        return $this->Categorie;
    }

    public function setCategorie($Categorie)
    {
        $this->Categorie = $Categorie;
    }

    
}