<?php

namespace webStudent\EtudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use webStudent\EtudiantBundle\Entity\Etudiant;
use webStudent\EtudiantBundle\Entity\Section;

class EtudiantController extends Controller
{
    public function indexAction()
    {
		//return new Response("Salut tout le monde; test") ;
        return $this->render('webStudentEtudiantBundle:Etudiant:index.html.twig');
        //return $this->render('tapa2stageEtudiantBundle:Default:index.html.twig', array('name' => $name));
    }
     public function consulter2Action()
    {
       		//return new Response("TT") ;
    	return $this->render('webStudentEtudiantBundle:Etudiant:consulter.html.twig');
    	//return $this->render('webStudentEtudiantBundle:Etudiant:index.html.twig');

    }
     public function modifier2Action($id)
    {
       		//return new Response("TT") ;
    	return $this->render('webStudentEtudiantBundle:Etudiant:modifier.html.twig', array('id' => $id));
    	//return $this->render('webStudentEtudiantBundle:Etudiant:index.html.twig');

    }
     public function TestAction()
    {
       		return new Response("Test") ;
    	//return $this->render('webStudentEtudiantBundle:Etudiant:modifier.html.twig', array('id' => $id));
    	//return $this->render('webStudentEtudiantBundle:Etudiant:index.html.twig');

    }

public function ajouterAction()

    {

    $repository = $this->getDoctrine()->getManager()->getRepository('webStudentEtudiantBundle:Section');
    // On récupère l'entité correspondant à l'id $id
     $section = $repository->findOneByid(1);
     // Ou null si aucune section n'a été trouvé avec l'id $id
    if($section === null){
    throw $this->createNotFoundException('Section[code='.$code.'] inexistant.');
    
}

       
      // var_dump($section);// Etape 0 – creation de l'objet Etudiant

        $etudiant = new Etudiant();
        $etudiant->setSection($section);
        $etudiant->setCode("test");
        $etudiant->setNom('Bures');
        $etudiant->setPrenom('Maxence');
        $etudiant->setTelephone('0233350678');
        $etudiant->setAdressemail('test@gmail.com');
        $etudiant->setDate('2');

    // Etape 1 On récupère l'EntityManager

     $em = $this->getDoctrine()->getManager();

 

    // Étape 2 : On « persiste » l'entité
      $em->persist($section);
      $em->persist($etudiant);

   

     // Étape 3 : On « flush » tout ce qui a été persisté avant

     $em->flush();

   

    return $this->render('webStudentEtudiantBundle:Etudiant:consulter.html.twig');

  } 

  public function ajouterSectionAction()
{
// Etape 0 – creation de l'objet Section
$section = new Section();
$section->setCode('Sio');
$section->setNom('BTS Sio');
$section->setNb(32);
// Etape 1 On récupère l'EntityManager
$em = $this->getDoctrine()->getManager();
// Étape 2 : On « persiste » l'entité
$em->persist($section);
// Étape 3 : On « flush » tout ce qui a été persisté avant
$em->flush();
return $this->render('webStudentEtudiantBundle:Etudiant:index.html.twig');
}

public function consulterSectionAction($id)
{
$repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('webStudentEtudiantBundle:Section');
// On récupère l'entité correspondant à l'id $id
$section = $repository->find($id);
// Ou null si aucune section n'a été trouvé avec l'id $id
 if($section === null)
    {
 throw $this->createNotFoundException('Section[id='.$id.'] inexistant.');
}
return $this->render('webStudentEtudiantBundle:Etudiant:consultUtil.html.twig', array(
        'id' => $section->getNom(),
        'nb' => $section->getNb()
));}



public function ListeAction()
    {
        $repository=$this->getDoctrine()->getManager()->getRepository('webStudentEtudiantBundle:Etudiant');
        $listeEtudiant=$repository->findAll();
        foreach ($listeEtudiant as $etudiant) {
            $etudiant->getNom();
        }
        //var_dump($listeEtudiant) ;
        return $this->render('webStudentEtudiantBundle:Etudiant:consulterListeEtudiant.html.twig', array('listeEtudiant' => $listeEtudiant));
    }

public function consulterEtudiantAction($id)
{
$repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('webStudentEtudiantBundle:Etudiant');
// On récupère l'entité correspondant à l'id $id
$etudiant = $repository->find($id);
// Ou null si aucune section n'a été trouvé avec l'id $id
 if($etudiant === null)
    {
 throw $this->createNotFoundException('Etudiant[id='.$id.'] inexistant.');
}
return $this->render('webStudentEtudiantBundle:Etudiant:consultEUtil.html.twig', array(
        'nom' => $etudiant->getId(),
        'prenom' => $etudiant->getDate()
));}

public function consulterEtudiant2Action($id)
    {
        $repository = $this->getDoctrine()
                       ->getManager()
                       ->getRepository('webStudentEtudiantBundle:Utilisateur');

        // On récupère l'entité correspondant à l'id $id
        $etudiant = $repository->find($id);

        // Ou null si aucune section n'a été trouvé avec l'id $id
         if($etudiant === null)
         {
         throw $this->createNotFoundException('Etudiant[id='.$id.'] inexistant.');
        }
         
        return $this->render('webStudentEtudiantBundle:Etudiant:consultEUtil.html.twig', array(
             'id' => $etudiant->getNom(),
             'prenom' => $etudiant->getPrenom(),
             'mail' => $etudiant->getAdressemail(),
             'telephone' => $etudiant->getTelephone()


            ));
    }

public function consulterStageAction($id)
{
$repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('webStudentEtudiantBundle:Stage');
// On récupère l'entité correspondant à l'id $id
$stage = $repository->find($id);
// Ou null si aucune section n'a été trouvé avec l'id $id
 if($stage === null)
    {
 throw $this->createNotFoundException('Stage[id='.$id.'] inexistant.');
}
return $this->render('webStudentEtudiantBundle:Etudiant:consultStage.html.twig', array(
        'id' => $stage->getIntitule(),
        'debut' => $stage->getDateDebut(),
        'fin'=> $stage->getDateFin(),
        'activite'=> $stage->getActivite(),
        'entreprise'=> $stage->getEntreprise()
));}    

public function ListeStageAction()
    {
        $repository=$this->getDoctrine()->getManager()->getRepository('webStudentEtudiantBundle:Stage');
        $listeStage=$repository->findAll();
        foreach ($listeStage as $stage) {
            $stage->getIntitule()
            ;
        }
        //var_dump($listeEtudiant) ;
        return $this->render('webStudentEtudiantBundle:Etudiant:consulterListeStage.html.twig', array('listeStage' => $listeStage));
    }

public function test2Action()
    {
        //return new Response("Salut tout le monde; test") ;
        return $this->render('webStudentEtudiantBundle:Etudiant:test.html.twig');
        //return $this->render('tapa2stageEtudiantBundle:Default:index.html.twig', array('name' => $name));
    }   

    public function consulterLesEntreprisesAction()
    {
        $repository = $this->getDoctrine()
                       ->getManager()
                       ->getRepository('webStudentEtudiantBundle:Utilisateur');

        $tabEntreprises = $repository->findAll();

        return $this->render('webStudentEtudiantBundle:Entreprise:consulterLesEntreprises.html.twig', array(
             'listeEntreprises' => $tabEntreprises));
        
    }

    public function consulterEntrepriseAction($id)
    {
        $repository = $this->getDoctrine()
                       ->getManager()
                       ->getRepository('webStudentEtudiantBundle:Entreprise');
        // On récupère l'entité correspondant à l'id $id
        $entreprise = $repository->find($id);

        // Ou null si aucune entreprise n'a été trouvé avec l'id $id
         if($entreprise === null)
         {
         throw $this->createNotFoundException('Entreprise[id='.$id.'] inexistante.');
         }
         
        return $this->render('webStudentEtudiantBundle:Entreprise:consulterEntreprise.html.twig', array(
             'entreprise' => $entreprise
            ));
    }

    public function rechercherEntrepriseAction($nom)
    {
        $repository = $this->getDoctrine()
                       ->getManager()
                       ->getRepository('webStudentEtudiantBundle:Entreprise');

        $tabEntreprises = $repository->rechercherEntreprise($nom);

        return $this->render('webStudentEtudiantBundle:Entreprise:consulterLesEntreprises.html.twig', array(
             'listeEntreprises' => $tabEntreprises));
    } 

}
