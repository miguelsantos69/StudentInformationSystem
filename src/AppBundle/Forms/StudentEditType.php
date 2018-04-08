<?php

namespace AppBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class StudentEditType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {


        $builder
                ->add('name', TextType::class)
                ->add('surname', TextType::class)
                ->add('pesel', TextType::class)
                ->add('address', TextType::class)
                ->add('email', EmailType::class)
                ->add('password', TextType::class)
                ->add('classroom', EntityType::class, [
                    'class' => 'AppBundle:Classroom'
                ])
                ->add('gender', TextType::class)
                ->add('birthday', DateType::class)
                ->add('edit', SubmitType::class);
    }

}
