<?php

namespace webStudent\EtudiantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EtudiantType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text')
            ->add('prenom','text')
            ->add('adressemail','text')
            ->add('telephone','text')
            ->add('date','date')
            ->add('section','entity', array(
                                        'class'    => 'webStudentEtudiantBundle:Section',
                                        'property' => 'nom',
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
            'data_class' => 'webStudent\EtudiantBundle\Entity\Etudiant'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'webstudent_etudiantbundle_etudiant';
    }
}
