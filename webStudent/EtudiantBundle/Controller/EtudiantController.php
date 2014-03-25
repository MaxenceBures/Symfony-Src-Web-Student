<?php

namespace webStudent\EtudiantBundle\Controller;

use webStudent\EtudiantBundle\Form\EntrepriseType;
use webStudent\EtudiantBundle\Form\EntrepriseModifType;
use webStudent\EtudiantBundle\Form\EtudiantType;
use webStudent\EtudiantBundle\Form\StageType;
use webStudent\EtudiantBundle\Entity\Etudiant;
use webStudent\EtudiantBundle\Entity\Stage;
use webStudent\EtudiantBundle\Entity\Entreprise;
use webStudent\EtudiantBundle\Entity\Enseignant;
use webStudent\EtudiantBundle\Entity\Section;
use webStudent\EtudiantBundle\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class EtudiantController extends Controller
{
    public function indexAction(){
    //return new Response("Salut tout le monde; test") ;
        return $this->render('webStudentEtudiantBundle:Etudiant:index.html.twig');
        //return $this->render('tapa2stageEtudiantBundle:Default:index.html.twig', array('name' => $name));
    }
public function ListeAction(){
        $repository=$this->getDoctrine()->getManager()->getRepository('webStudentEtudiantBundle:Etudiant');
        $listeEtudiant=$repository->findAll();
        foreach ($listeEtudiant as $etudiant) {
            $etudiant->getNom();
            // $etudiant->getId();
        }
        //var_dump($listeEtudiant) ;
        return $this->render('webStudentEtudiantBundle:Etudiant:consulterListeEtudiant.html.twig', array('listeEtudiant' => $listeEtudiant));
}

public function consulterEtudiant2Action($id){
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
         
        return $this->render('webStudentEtudiantBundle:Etudiant:consultEUtil.html.twig', array('etudiant' =>$etudiant
          
            


            ));
}
public function consulterStageAction($id){
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
    return $this->render('webStudentEtudiantBundle:Etudiant:consultStage.html.twig', array('stage' =>$stage
            
    ));
}    
public function ListeStageAction(){
        $repository=$this->getDoctrine()->getManager()->getRepository('webStudentEtudiantBundle:Stage');
        $listeStage=$repository->findAll();
        foreach ($listeStage as $stage) {
            $stage->getIntitule()
            ;
        }
        //var_dump($listeEtudiant) ;
        return $this->render('webStudentEtudiantBundle:Etudiant:consulterListeStage.html.twig', array('listeStage' => $listeStage));
}
public function ListeEntrepriseAction(){
        $repository=$this->getDoctrine()
                         ->getManager()
                         ->getRepository('webStudentEtudiantBundle:Entreprise');
        $listeStage=$repository->findAll();
        foreach ($listeStage as $stage) {
            $stage->getId()
            ;
        }
        //var_dump($listeEtudiant) ;
        return $this->render('webStudentEtudiantBundle:Etudiant:consulterListeEntreprise.html.twig', array('listeEntreprise' => $listeStage));
}    
public function consulterEntrepriseAction($id){
    $repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('webStudentEtudiantBundle:Entreprise');
    // On récupère l'entité correspondant à l'id $id
    $entreprise = $repository->find($id);
    // Ou null si aucune section n'a été trouvé avec l'id $id
     if($entreprise === null)
        {
     throw $this->createNotFoundException('Entreprise[id='.$id.'] inexistant.');
    }
    return $this->render('webStudentEtudiantBundle:Etudiant:consultEntreprise.html.twig', array('entreprise' =>$entreprise
           
    ));
}  

public function accueilAction()
    {
        //return new Response("Salut tout le monde; test") ;
        return $this->render('webStudentEtudiantBundle:Etudiant:test.html.twig');
        //return $this->render('tapa2stageEtudiantBundle:Default:index.html.twig', array('name' => $name));
    }
public function test3Action()
    {
            //return new Response("TT") ;
        return $this->render('webStudentEtudiantBundle:Etudiant:layout.html.twig');
        //return $this->render('webStudentEtudiantBundle:Etudiant:index.html.twig');

    }       
  
   public function ajouterStageAction()
  {

    // On teste que l'utilisateur dispose bien du rôle ROLE_ENSEIGNANT
      

    //var_dump($section);
      $stage = new Stage ();
      $form = $this->createForm(new StageType, $stage);
    
      // On récupère la requête
      $request = $this->get('request');
     
      // On vérifie qu'elle est de type POST
      if ($request->getMethod() == 'POST') {
        // On fait le lien Requête <-> Formulaire
        // À partir de maintenant, la variable $etudiant contient les valeurs entrées dans le formulaire par le visiteur
        $form->bind($request);
   
        // On vérifie que les valeurs entrées sont correctes
        if ($form->isValid()) {
          // On l'enregistre notre objet $etudiant dans la base de données
          $em = $this->getDoctrine()->getManager();
          $em->persist($stage);
          $em->flush();
   
          // On redirige vers la page de visualisation de l'etudiant nouvellement créé
        return $this->render('webStudentEtudiantBundle:Etudiant:consultStage.html.twig', array('stage' =>$stage));
        }
      }
      // À ce stade :
      // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
      // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
      return $this->render('webStudentEtudiantBundle:Etudiant:ajouterStage.html.twig', array(
      'form' => $form->createView(),
      ));
    
  }
   public function ajouterEntrepriseAction()
  {

    // On teste que l'utilisateur dispose bien du rôle ROLE_ENSEIGNANT
      

    //var_dump($section);
      $entreprise = new Entreprise();
      $form = $this->createForm(new EntrepriseType, $entreprise);
    
      // On récupère la requête
      $request = $this->get('request');
     
      // On vérifie qu'elle est de type POST
      if ($request->getMethod() == 'POST') {
        // On fait le lien Requête <-> Formulaire
        // À partir de maintenant, la variable $etudiant contient les valeurs entrées dans le formulaire par le visiteur
        $form->bind($request);
   
        // On vérifie que les valeurs entrées sont correctes
        if ($form->isValid()) {
          // On l'enregistre notre objet $etudiant dans la base de données
          $em = $this->getDoctrine()->getManager();
          $em->persist($entreprise);
          $em->flush();
   
          // On redirige vers la page de visualisation de l'etudiant nouvellement créé
        return $this->render('webStudentEtudiantBundle:Etudiant:consultEntreprise.html.twig', array('entreprise' =>$entreprise));
        }
      }
      // À ce stade :
      // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
      // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
      return $this->render('webStudentEtudiantBundle:Etudiant:ajouterEntreprise.html.twig', array(
      'form' => $form->createView(),
      ));
    
  }
   public function ajouterEtudiantAction()
  {

    // On teste que l'utilisateur dispose bien du rôle ROLE_ENSEIGNANT
      

    //var_dump($section);
      $etudiant = new Etudiant();
      $form = $this->createForm(new EtudiantType, $etudiant);
    
      // On récupère la requête
      $request = $this->get('request');
     
      // On vérifie qu'elle est de type POST
      if ($request->getMethod() == 'POST') {
        // On fait le lien Requête <-> Formulaire
        // À partir de maintenant, la variable $etudiant contient les valeurs entrées dans le formulaire par le visiteur
        $form->bind($request);
   
        // On vérifie que les valeurs entrées sont correctes
        if ($form->isValid()) {
          // On l'enregistre notre objet $etudiant dans la base de données
          $em = $this->getDoctrine()->getManager();
          $em->persist($etudiant);
          $em->flush();
   
          // On redirige vers la page de visualisation de l'etudiant nouvellement créé
        return $this->render('webStudentEtudiantBundle:Etudiant:consultEUtil.html.twig', array('etudiant' =>$etudiant));
        }
      }
      // À ce stade :
      // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
      // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
      return $this->render('webStudentEtudiantBundle:Etudiant:ajouterEtudiant.html.twig', array(
      'form' => $form->createView(),
      ));
    
  }
   public function modifierEntrepriseAction($id)
    {

        

        $repository = $this->getDoctrine()->getManager()->getRepository('webStudentEtudiantBundle:Entreprise');
        $entreprise = $repository->find($id);
        $form = $this->createForm(new EntrepriseModifType, $entreprise);
    
        // On récupère la requête
        $request = $this->get('request');
   
        // On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            // On fait le lien Requête <-> Formulaire
            // À partir de maintenant, la variable $organisation contient les valeurs entrées dans le formulaire par le visiteur
            $form->bind($request);
 
            // On vérifie que les valeurs entrées sont correctes
            if ($form->isValid()) {
                // On l'enregistre notre objet $organisation dans la base de données
                $em = $this->getDoctrine()->getManager();
                $em->persist($entreprise);
                $em->flush();
 
                // On redirige vers la page de visualisation de l'organisation modifié
            return $this->render('webStudentEtudiantBundle:Etudiant:consultEntreprise.html.twig', array('entreprise' => $entreprise));
            }
        }
        // À ce stade :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
        return $this->render('webStudentEtudiantBundle:Etudiant:modifierEntreprise.html.twig', array(
        'form' => $form->createView(),
        ));
    }

}