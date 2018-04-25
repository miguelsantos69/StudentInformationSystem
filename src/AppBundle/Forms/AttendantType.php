<?php

namespace AppBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class AttendantType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('name', TextType::class)
                ->add('surname', TextType::class)
                ->add('pesel', TextType::class)
                ->add('email', EmailType::class)
                ->add('password', TextType::class)
                ->add('student', EntityType::class, [
                    'class' => 'AppBundle:Student',
                    'multiple' => true
                ])
                ->add('create', SubmitType::class);
    }

}
