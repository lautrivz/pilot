<?php

namespace Pilot\NewslineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AuthorType extends AbstractType {
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name', 'text', array('label' => 'Имя'))
            ->add('surname', 'text', array('label' => 'Фамилия'))
            ->add('login', 'text', array('label' => 'Логин'))
            ->add('news', 'entity', array(
                'class'     => 'PilotNewslineBundle:News',
                'property'  => 'id',
                'expanded'  => true,
                'multiple'  => true, 'label' => 'Выберите новости'
            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Pilot\NewslineBundle\Entity\Author'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'author';
    }
}
