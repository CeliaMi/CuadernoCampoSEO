<?php

namespace App\Form;

use App\Entity\Alerta;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlertaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombreTipoDeAmenaza')
            ->add('ubicacion') 
            ->add('foto')
            ->add('descripcion')
            ->add('nivelgravedad')
            ->add('superficieAfectada')
            ->add('tiempoDesarrollo')
            ->add('nombreContacto')
            ->add('emailContacto')
            ->add('telefonoContacto')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Alerta::class,
        ]);
    }
}
