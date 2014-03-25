<?php

namespace webStudent\EtudiantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class StageType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule','text')
            ->add('dateDebut','date')
            ->add('dateFin','date')
            ->add('activite','text')
            ->add('entreprise','entity', array(
                                        'class'    => 'webStudentEtudiantBundle:Entreprise',
                                        'property' => 'raisonSociale',
                                        'multiple' => false,
                                        'expanded' => false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'webStudent\EtudiantBundle\Entity\Stage'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'webstudent_etudiantbundle_stage';
    }
}
