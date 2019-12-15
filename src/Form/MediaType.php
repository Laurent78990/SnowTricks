<?php

namespace App\Form;

use App\Entity\Media;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints\File;

class MediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')

            // ->add('mediaName')
            // ->add('createdAt') // tbd in the ctrlr
            // ->add('trick')     // tbd in the ctrlr

            // ...
            ->add('media', FileType::class, [
                'label' => 'Média',

                'attr' => [
                    'class' => 'media-input-field',
                    'placeholder' => 'Chargez une image ou une vidéo',
                ],

                // unmapped means that this field is not associated to any TRICK property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // everytime you edit the TRICK details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '3500k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                            'video/mp4',
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Chargez une image ou une vidéo',
                    ])
                ],
            ])
            // ...


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Media::class,
        ]);
    }
}
