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
                    'multiple' => true,
                    'required' => false
                ])
                ->add('teacher', EntityType::class, [
                    'class' => 'AppBundle:Teacher',
                    'multiple' => true,
                    'required' => false
                ])
                ->add('create', SubmitType::class);
    }

}
