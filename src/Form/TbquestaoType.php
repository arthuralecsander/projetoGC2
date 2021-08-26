<?php

namespace App\Form;

use App\Entity\Tbquestao;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TbquestaoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('questao')
            ->add('tbassuntoid')
            ->add('tbbancaid')
            ->add('tborgaoid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tbquestao::class,
        ]);
    }
}
