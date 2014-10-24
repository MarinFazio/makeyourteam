<?php

namespace MYT\MakeYourTeamBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AnnonceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text')
            ->add('contenu', 'textarea')
            ->add('published', 'checkbox', array('required' => false))
            ->add('enregistrer', 'submit')
//            ->add('auteur')
//            ->add('mdate')
//            ->add('cdate')
//            ->add('slug')
//            ->add('categories')
//            ->add('image')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MYT\MakeYourTeamBundle\Entity\Annonce'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'myt_makeyourteambundle_annonce';
    }
}
