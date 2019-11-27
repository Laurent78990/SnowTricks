<?php
// This from is used when creating a new Trick

namespace App\Form;

use App\Entity\Trick;

use App\Entity\Category; // adding the target Entity
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')

             // ...
             ->add('cover', FileType::class, [
                'label' => 'Image (jpg, png)',

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
                            'image/vnd.sealedmedia.softseal.jpg',
                        ],
                        'mimeTypesMessage' => 'Please upload a .png or .jpg image.',
                    ])
                ],
            ])
            // ...
            
            ->add('comment')

            // ->add('category')
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
            ])

            ->add('author')
            // ->add('createdAt')
            // ->add('updatedAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
