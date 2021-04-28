<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AjoutTransacType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Selectionner_une_crypto', ChoiceType::class,
                [
                'choices' => [
                    'Bitcoin'   => 'Bitcoin',
                    'Ethereum'   => 'Ethereum',
                ]
            ])
            ->add('Quantite', NumberType::class,
                array(
                    'label' => 'Quantité ',
                    'attr' => array(
                        'placeholder' => 'Quantité'
                    ))
            )
            ->add('Prixdachat', NumberType::class,
                array(
                    'label' => 'Prix d\'achat (en €)',
                    'attr' => array(
                        'placeholder' => 'Prix d\'achat'
                    ))
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
