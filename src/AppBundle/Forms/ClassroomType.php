<?php

namespace AppBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class ClassroomType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('mark', TextType::class)
                ->add('description', TextType::class)
                ->add('level', IntegerType::class)
                ->add('schoolyearend', IntegerType::class)
                ->add('create', SubmitType::class);
    }

}
