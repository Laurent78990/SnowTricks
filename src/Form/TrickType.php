<?php
// This from is used when creating a new Trick

namespace App\Form;

use App\Entity\Trick;

use App\Entity\Category; // adding the target Entity
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
            ->add('name', TextType::class , [
                'label' => 'Trick name',
                'attr' => [
                    'class' => 'a-css-class; gradient-blue',
                    'placeholder' => 'New trick name...',
                ],
            ])
            
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'attr' => [
                    'class' => 'a-css-class; gradient-blue',
                    'placeholder' => 'Select a category...',
                ],
            ])

             // ...
             ->add('cover', FileType::class, [
                'label' => 'Load a picture (jpg, png)',

                'attr' => [
                    'class' => 'a-css-class; gradient-blue',
                    'placeholder' => 'Select a .jpg or .png picture...',
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
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                        ],
                        'mimeTypesMessage' => 'Please upload a .png or .jpg image.',
                    ])
                ],
            ])
            // ...
            
            ->add('comment', TextareaType::class, [

                'attr' => [
                    'class' => 'a-css-class; gradient-blue',
                    'placeholder' => 'You can type in or paste the texte here...',
                ],
            ])

            // ->add('author')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
