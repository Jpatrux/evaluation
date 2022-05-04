<?php

namespace App\Form;

use App\Entity\Cars;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class CarsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('model')
            ->add('brand')
            ->add('price')
            ->add('release_date')
            ->add('kilometers')
            ->add('fuel')
            ->add('license')
            ->add('picture', FileType::class, ['label' => 'Image', 'required' => false,
                'constraints' => [new File([
                    'maxSize' => '1024k',
                    'maxSizeMessage' => 'Taille du fichier trop importante. Taille limitée à 1024ko',
                    'mimeTypes' => ['image/jpeg', 'image/png'], 'mimeTypesMessage' => 'Merci de téléverser une image JPEG ou PNG'
                ])]]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cars::class,
        ]);
    }
}
