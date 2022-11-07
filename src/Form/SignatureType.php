<?php

namespace App\Form;

use App\Entity\Signature;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class SignatureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom',TextType::class, [
                'label' => false,
                ])
            ->add('Prenom',TextType::class, [
                'label' => false,
                ])
            ->add('mail',TextType::class, [
                'label' => false,
                ])
            ->add('poste',TextType::class, [
                'label' => false,
                ])
            ->add('ld',TextType::class, [
                'label' => false,
                ])
            ->add('lf',TextType::class, [
                'label' => false,
                ])
            ->add('agence',TextType::class, [
                'label' => false,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Signature::class,
        ]);
    }
}
