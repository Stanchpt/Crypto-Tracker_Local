<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeleteTransacType extends AbstractType
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
            ->add('Quantite_de_crypto', NumberType::class,
                array(
                    'label' => 'Quantité ',
                    'attr' => array(
                        'placeholder' => 'Quantité'
                    ))
            )
            ->add('Prix_de_la_transaction', NumberType::class,
                array(
                    'label' => 'Prix (en €)',
                    'attr' => array(
                        'placeholder' => 'Prix'
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
