<?php

namespace webStudent\StageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class StageController extends Controller
{
    public function indexAction()
    {
       		return new Response("test") ;

    }
     public function ConsulterAction()
    {
       		//return new Response("test") ;
    	return $this->render('webStudentEtudiantBundle:Stage:consulter.html.twig');
    	//return $this->render('webStudentEtudiantBundle:Etudiant:index.html.twig');

    }
     public function ModifierAction()
    {
       		//return new Response("test") ;
    	return $this->render('webStudentEtudiantBundle:Stage:modifier.html.twig');
    	//return $this->render('webStudentEtudiantBundle:Etudiant:index.html.twig');

    }
}
