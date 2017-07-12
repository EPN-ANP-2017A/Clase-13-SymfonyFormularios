<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EstudianteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
	        ->add('nombre')
	        ->add('apellido')
	        ->add('cedula')
			->add('carrera', EntityType::class, array(
	        // query choices from this entity
	        'class' => 'AppBundle:Carrera',

	        // use the Category.nombre property as the visible option string
	        'choice_label' => function ($carrera) {
		        return $carrera->getNombre();
	        },

	        // used to render a select box, check boxes or radios
				// uncomment both lines to render as checkboxes
	        // 'multiple' => true, // <===== uncomment this to render as multiple choice list
	        // 'expanded' => true, // <===== uncomment this to render as radios
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Estudiante'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_estudiante';
    }


}
