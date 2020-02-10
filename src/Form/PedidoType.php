<?php

namespace App\Form;

use App\Entity\Pedido;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


use App\Entity\Cliente;

class PedidoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fec_ped')
            ->add('est_ped')
            ->add('id_cli', EntityType::class,[
                'class' => Cliente::class,
                'choice_label'=>'nom_cli'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pedido::class,
        ]);
    }
}
