<?php
/**
 * Created by PhpStorm.
 * User: linkouth
 * Date: 09.06.18
 * Time: 11:01
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Validator\Constraints\Choice;
use \AppBundle\Entity\Candidate;

class CandidateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('surname', TextType::class)
            ->add('age', TextType::class)
            ->add('email', TextType::class)
            ->add('city', TextType::class)
            ->add('university', TextType::class)
            ->add('englishLevel', ChoiceType::class)
            ->add('aboutMe', TextareaType::class)
            ->add('agreement', CheckboxType::class, array('mapped' => false))
            ->add('send', SubmitType::class)
            ->getForm();
    }
}