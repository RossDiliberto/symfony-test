<?php

namespace App\Form;

use App\Entity\Utenti;

use App\Entity\Gruppo;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UtentiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, array(
                   'attr' => array('class' => 'rounded form-control')
                ))
            ->add('cognome', TextType::class, array(
                    'attr' => array('class' => 'rounded form-control')
                ))
            ->add('email', EmailType::class, array(
                    'attr' => array('class' => 'rounded form-control'),
                    'required' => true
                ))
            ->add('gruppo',EntityType::class,['class' => Gruppo::class,
                    'choice_label' => 'nome', 'attr' => array('class' => 'rounded form-control')  ])
            ->add('save', SubmitType::class, array(
                    'label' => 'Crea un utente',
                    'attr' => array('class' => 'rounded btn btn-success mt-3')
            ));
                                            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utenti::class,
        ]);
    }
}