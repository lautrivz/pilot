<?php

namespace Pilot\NewslineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsType extends AbstractType {
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('title', 'text', array('label' => 'Заголовок'))
            ->add('content', 'textarea', array('label' => 'Содержимое'))
            ->add('authors', 'entity', array(
                'class'     => 'PilotNewslineBundle:Author',
                'property'  => 'login',
                'expanded'  => true,
                'multiple'  => true, 'label' => 'Выберите авторов'
            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Pilot\NewslineBundle\Entity\News'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'news';
    }
}
