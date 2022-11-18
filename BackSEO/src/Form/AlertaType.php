<?php

namespace App\Form;

use App\Entity\Alerta;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\File;

class AlertaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tipoAmenaza', ChoiceType::class, [
                'choices'=>Alerta::TIPOAMENAZA  
                ])
            ->add('ubicacion')
            ->add('foto', FileType::class, [
                'label' => 'Añadir foto',
                'mapped' => false,
                'required' => false,
            ])
            ->add('descripcion')
            ->add('severidadAmenaza', ChoiceType::class, [
                'choices'=>Alerta::SEVERIDAD
            ])
            ->add('superficieAfectada', ChoiceType::class, [
                'choices'=>Alerta::SUPERFICIE
            ])
            ->add('tiempoDesarrollo', ChoiceType::class, [
                'choices'=>Alerta::TIEMPO
            ])
            ->add('nombreContacto')
            ->add('emailContacto')
            ->add('telefonoContacto')
            ->add('observaciones')
            ->add('espacioProtegido')
            ->add('planDeGestion')
            ->add('actividadesDeConservacion')
            ->add('organizaciones')
            ->add('IBA')
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Alerta::class,
        ]);
    }

}
