<?php

namespace App\Form;

use App\Entity\Gruppo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class GruppoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, array(
                'attr' => array('class' => 'rounded form-control')
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Crea un gruppo',
                'attr' => array('class' => 'rounded btn btn-success mt-3')
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gruppo::class,
        ]);
    }
}