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
use App\Entity\Respuestas;

class AlertaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tipoAmenaza', ChoiceType::class, [
                'choices'=>Respuestas::TIPOAMENAZA,
                'placeholder' => 'Seleccione una opción',  
                ])
            ->add('ubicacion')
            ->add('foto', FileType::class, [
                'label' => 'Añadir foto',
                'mapped' => false,
                'required' => false,
            ])
            ->add('descripcion')
            ->add('severidadAmenaza', ChoiceType::class, [
                'choices'=>Respuestas::SEVERIDAD,
                'placeholder' => 'Seleccione una opción',
            ])
            ->add('superficieAfectada', ChoiceType::class, [
                'choices'=>Respuestas::SUPERFICIE,
                'placeholder' => 'Seleccione una opción',
            ])
            ->add('tiempoDesarrollo', ChoiceType::class, [
                'choices'=>Respuestas::TIEMPO,
                'placeholder' => 'Seleccione una opción',
            ])
            ->add('espacioProtegido', ChoiceType::class, [
                'choices'=>Respuestas::RESPUESATIPO,
                'placeholder' => 'Seleccione una opción',
                ])
            ->add('planDeGestion',ChoiceType::class, [
                'choices'=>Respuestas::RESPUESATIPO,
                'placeholder' => 'Seleccione una opción',
                ])
            ->add('actividadesDeConservacion', ChoiceType::class, [
                'choices'=>Respuestas::RESPUESATIPO,
                'placeholder' => 'Seleccione una opción',
                ])
            ->add('organizaciones', ChoiceType::class, [
                'choices'=>Respuestas::RESPUESATIPO,
                'placeholder' => 'Seleccione una opción',
                ])
            ->add('IBA', ChoiceType::class, [
                'choices'=>Respuestas::RESPUESATIPO,
                'placeholder' => 'Seleccione una opción',
                ])
            ->add('observaciones')
            ->add('nombreContacto')
            ->add('emailContacto')
            ->add('telefonoContacto')
            ->add('agreeTerms', CheckboxType::class, [
                // 'label' => 'Sí, he leído y acepto las condiciones',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ]
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
