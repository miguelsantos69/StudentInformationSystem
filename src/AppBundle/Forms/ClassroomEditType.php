<?php

namespace AppBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class ClassroomEditType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('mark', TextType::class)
                ->add('description', TextType::class)
                ->add('level', IntegerType::class)
                ->add('schoolyearend', IntegerType::class)
                ->add('subject', EntityType::class, [
                    'class' => 'AppBundle:subject',
                    'multiple' => true
                ])
                ->add('teacher', EntityType::class, [
                    'class' => 'AppBundle:Teacher',
                    'multiple' => true
                ])
                ->add('student', EntityType::class, [
                    'class' => 'AppBundle:Student',
                    'multiple' => true
                ])
                ->add('create', SubmitType::class);
    }

}
