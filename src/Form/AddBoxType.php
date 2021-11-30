<?php

namespace App\Form;

use App\Entity\Colis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddBoxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', NumberType::class, [
                'attr' => [
                    'placeholder' => 'numéro du colis...'
                ]
            ])
            ->add('nombre', NumberType::class, [
                'attr' => [
                    'placeholder' => 'nombre de colis...'
                ]
            ])
            ->add('loadinglab', TextType::class, [
                'attr' => [
                    'placeholder' => 'Laboratoire de chargement...'
                ]
            ])
            ->add('deliverylab', TextType::class, [
                'attr' => [
                    'placeholder' => 'Laboratoire de livraison...'
                ]
            ])
            ->add('vehicule')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'addColisForm' => Colis::class,
        ]);
    }
}
