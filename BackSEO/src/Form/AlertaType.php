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
            ->add('ubicacion')
            ->add('foto')
            ->add('descripcion')
            ->add('nombreContacto')
            ->add('emailContacto')
            ->add('telefonoContacto')
            ->add('nivelGravedad')
            ->add('superficieAfectada')
            ->add('tiempoDesarrollo')
            ->add('nombreTipoDeAmenaza')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Alerta::class,
        ]);
    }
}
