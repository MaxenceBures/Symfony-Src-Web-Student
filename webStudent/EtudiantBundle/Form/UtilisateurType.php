<?php

namespace webStudent\EtudiantBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UtilisateurType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('adressemail')
            ->add('telephone')
            ->add('section')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'webStudent\EtudiantBundle\Entity\Utilisateur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'webstudent_etudiantbundle_utilisateur';
    }
}
