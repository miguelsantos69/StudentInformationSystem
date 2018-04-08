<?php

namespace AppBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class SubjectType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('title', TextType::class)
                ->add('classroom', EntityType::class, [
                    'class' => 'AppBundle:Classroom',
                    'multiple' => true
                ])
                ->add('teacher', EntityType::class, [
                    'class' => 'AppBundle:Teacher',
                    'multiple' => true
                ])
                ->add('create', SubmitType::class);
    }

}
