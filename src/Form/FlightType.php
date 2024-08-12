<?php

namespace App\Form;

use App\Entity\Flight;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FlightType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('departure')
            ->add('destination')
            ->add('departureTime', null, [
                'widget' => 'single_text',
            ])
            ->add('arrivalTime', null, [
                'widget' => 'single_text',
            ])
            ->add('price')
            ->add('airline')
            ->add('flightNumber')
            ->add('duration', null, [
                'widget' => 'single_text',
            ])
            ->add('availablesSeats')
            ->add('status')
            ->add('personnNumber')
            ->add('classFlight')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Flight::class,
        ]);
    }
}
