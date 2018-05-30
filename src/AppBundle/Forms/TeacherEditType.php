<?php

namespace AppBundle\Forms;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TeacherEditType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
                ->add('name', TextType::class)
                ->add('surname', TextType::class)
                ->add('pesel', TextType::class)
                ->add('address', TextType::class)
                ->add('email', EmailType::class)
                ->add('classroom', EntityType::class, [
                    'class' => 'AppBundle:Classroom',
                    'multiple' => true,
                    'required' => false
                ])
                ->add('phone', TextType::class)
                ->add('subject', EntityType::class, [
                    'class' => 'AppBundle:Subject',
                    'multiple' => true,
                    'required' => false
                ])
                ->add('avatar', FileType::class, [
                    'label' => 'Avatar (JPG file, max 2MB)',
                    'data_class' => null,
                    'required' => false
                ])
                ->add('bio', TextType::class, [
                    'required' => false
                ])
                ->add('edit', SubmitType::class);
    }

}
