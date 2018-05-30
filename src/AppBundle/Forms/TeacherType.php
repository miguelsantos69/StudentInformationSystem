<?php

namespace AppBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TeacherType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('name', TextType::class)
                ->add('surname', TextType::class)
                ->add('pesel', TextType::class)
                ->add('address', TextType::class)
                ->add('email', EmailType::class)
                ->add('password', TextType::class)
                ->add('phone', TextType::class)
                ->add('avatar', FileType::class, 
                        ['label' => 'Avatar (JPG file)'])
                ->add('bio', TextType::class)
                ->add('add', SubmitType::class);
    }

}
