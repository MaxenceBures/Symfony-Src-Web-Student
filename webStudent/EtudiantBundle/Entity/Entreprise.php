<?php

namespace webStudent\EtudiantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Entreprise
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="webStudent\EtudiantBundle\Entity\EntrepriseRepository")
 */
class Entreprise
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
     * @var string
     *
     * @ORM\Column(name="RaisonSociale", type="string", length=80)
     * @Assert\Length(
     *      min = "2",
     *      max = "80",
     *      minMessage = "Votre raison sociale doit faire au moins {{ limit }} caractères",
     *      maxMessage = "Votre raison sociale ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $raisonSociale;

    /**
     * @var string
     *
     * @ORM\Column(name="Rue", type="string", length=50)
     * @Assert\Length(
     *      max = "50",
     *      maxMessage = "Votre rue ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $rue;

    /**
     * @var string
     *
     * @ORM\Column(name="Ville", type="string", length=50)
     * @Assert\Length(
     *      max = "50",
     *      maxMessage = "Votre ville ne peut pas être plus long que {{ limit }} caractères"
     * )
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="Cp", type="string", length=5)
     * @Assert\Length(
     *      min = "5",
     *      max = "5",
     *      exactMessage = "Votre Cp être egal à {{ limit }} caractères"
     * )
     */
    private $cp;


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
     * Set raisonSociale
     *
     * @param string $raisonSociale
     * @return Entreprise
     */
    public function setRaisonSociale($raisonSociale)
    {
        $this->raisonSociale = $raisonSociale;
    
        return $this;
    }

    /**
     * Get raisonSociale
     *
     * @return string 
     */
    public function getRaisonSociale()
    {
        return $this->raisonSociale;
    }

    /**
     * Set rue
     *
     * @param string $rue
     * @return Entreprise
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
    
        return $this;
    }

    /**
     * Get rue
     *
     * @return string 
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Entreprise
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    
        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return Entreprise
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    
        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }
}
