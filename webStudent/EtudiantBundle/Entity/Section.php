<?php

namespace webStudent\EtudiantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Section
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="webStudent\EtudiantBundle\Entity\SectionRepository")
 */
class Section
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
* @ORM\OneToMany(targetEntity="webStudent\EtudiantBundle\Entity\Utilisateur", mappedBy="utilisateur")
* @ORM\JoinColumn(nullable=false)
*/

    private $utilisateurs ;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=8)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=80)
     */
    private $nom;


    /**
    * @var integer
     *
     * @ORM\Column(name="nb", type="integer", length=10) 
     */

     private $nb;


    /**
     * Get nb
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Section
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Section
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }
    public function ajouterSectionAction()
{
       // Etape 0 – creation de l'objet Section
       $section = new Section();
       $section->setCode('CGO');
       $section->setNom('BTS Comptabilité');
       $section->setNbEtudiant(11);
       // Etape 1 On récupère l'EntityManager
        $em = $this->getDoctrine()->getManager();
       // Étape 2 : On « persiste » l'entité
       $em->persist($section);
        // Étape 3 : On « flush » tout ce qui a été persisté avant
        $em->flush();
       return $this->render('webStageEtudiantBundle:Etudiant:index.html.twig');
  }
  public function consulterSectionAction($id)
{
    $repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('webStageEtudiantBundle:Section');
    // On récupère l'entité correspondant à l'id $id
    $section = $repository->find($id);
    // Ou null si aucune section n'a été trouvé avec l'id $id
     if($section === null)
        {
     throw $this->createNotFoundException('Section[id='.$id.'] inexistant.');
    }
    return $this->render('webStageEtudiantBundle:Etudiant:index.html.twig', array(
            'id' => $section->getNom()
    ));
}

    /**
     * Set nb
     *
     * @param integer $nb
     * @return Section
     */
    public function setNb($nb)
    {
        $this->nb = $nb;
    
        return $this;
    }

    /**
     * Get nb
     *
     * @return integer 
     */
    public function getNb()
    {
        return $this->nb;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->utilisateurs = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add utilisateurs
     *
     * @param \webStudent\EtudiantBundle\Entity\Utilisateur $utilisateurs
     * @return Section
     */
    public function addUtilisateur(\webStudent\EtudiantBundle\Entity\Utilisateur $utilisateurs)
    {
        $this->utilisateurs[] = $utilisateurs;
    
        return $this;
    }

    /**
     * Remove utilisateurs
     *
     * @param \webStudent\EtudiantBundle\Entity\Utilisateur $utilisateurs
     */
    public function removeUtilisateur(\webStudent\EtudiantBundle\Entity\Utilisateur $utilisateurs)
    {
        $this->utilisateurs->removeElement($utilisateurs);
    }

    /**
     * Get utilisateurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }
}