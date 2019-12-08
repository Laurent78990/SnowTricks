<?php

namespace App\Form;

use App\Entity\Commentaire;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('message', TextareaType::class, [

                'attr' => [
                    'class' => 'trick-comment mt-3',
                    // 'label' => 'Nouveau message',
                    'placeholder' => 'Ajouter un commentaire ?',
                ],
            ])

            // A gérer dans le contrôleur
            // ->add('createdAt')
            // ->add('trick')
            // ->add('author')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commentaire::class,
        ]);
    }
}
