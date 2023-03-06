<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_option' => [
                    'label' => 'Enter your password',
                ],
                'second_options' => [
                  'label' => 'Repeate your password  ',
                ],
                'contraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password at least 8 characters and maximum 100'
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessages' => 'Your password is too small, minimum length 8 characters',
                        'max' => 100,
                    ])
                ],
            ])
            ->add('image', FileType::class, [
                'label' => 'Upload a profile picture'
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
