<?php

namespace webStudent\EtudiantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use webStudent\EtudiantBundle\Form\EntrepriseType;

class EntrepriseModifType extends EntrepriseType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       // On fait appel à la méthode buildForm du parent, qui va ajouter tous les champs à $builder
		parent::buildForm($builder, $options);
		//$etudiant = $options['data'];

        
		$builder->add('raisonSociale', 'text', array('read_only' => true));
        $builder->add('rue', 'text', array('read_only' => false));
        $builder->add('ville', 'text', array('read_only' => false));
        $builder->add('cp', 'text', array('read_only' => false));
	}
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'webStudent\EtudiantBundle\Entity\Entreprise'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'webstudent_etudiantbundle_entrepriseModif';
    }
}
