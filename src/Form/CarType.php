<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormBuilderInterface;
use App\Service\GetChoicesToForm\GetBodyTypeChoices;
use App\Service\GetChoicesToForm\GetFuelTypeChoices;
use App\Service\GetChoicesToForm\GetYearChoices;
use App\Service\GetChoicesToForm\GetGearboxTypeChoices;
use App\Service\GetChoicesToForm\GetBrandChoices;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\Regex;

class CarType extends AbstractType
{
    public function __construct(
        private GetBodyTypeChoices $getBodyTypeChoices, 
        private GetFuelTypeChoices $getFuelTypeChoices, 
        private GetYearChoices $getYearChoices,
        private GetGearboxTypeChoices $getGearboxTypeChoices,
        private GetBrandChoices $getBrandChoices,
        ) 
    {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $lastYear = $this->getYearChoices->get()['lastYear'];
        $firstYear = $this->getYearChoices->get()['firstYear'];
        $brandChoices = $this->getBrandChoices->get();
        $bodyTypeChoices = $this->getBodyTypeChoices->get();
        $fuelTypeChoices = $this->getFuelTypeChoices->get();
        $gearboxTypeChoices = $this->getGearboxTypeChoices->get();

        $builder
            ->add('model', SearchType::class, [
                'required' => false,
                'constraints' => [
                    new Length(['min' => 2]),
                    new Regex('/^[a-zA-Z0-9\.,\s-]{2,30}$/', "Only digits, letters and dot, comma and dash mark allowed. Min. 2 and max. 30 characters."),
                ],
            ])
            ->add('brand', ChoiceType::class, [
                'choices' => $brandChoices,
                'label' => 'Brand',
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('bodyType', ChoiceType::class, [
                'choices' => $bodyTypeChoices,
                'label' => 'Body type',
                'multiple'  => true,
                'expanded' => true,
                'required' => true,
                'data' => $bodyTypeChoices,
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('fuelType', ChoiceType::class, [
                'choices' => $fuelTypeChoices,
                'label' => 'Fuel type',
                'multiple'  => true,
                'data' => $fuelTypeChoices,
                'expanded' => true,
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('gearboxType', ChoiceType::class, [
                'choices' => $gearboxTypeChoices,
                'label' => 'Gearbox type',
                'multiple'  => true,
                'expanded' => true,
                'required' => true,
                'data' => $gearboxTypeChoices,
                'constraints' => [
                    new NotBlank(),
                ],
            ])
            ->add('yearMin', NumberType::class, [
                'html5' => true,
                'label' => 'Min year',
                'scale' => 0,
                'required' => false,
                'attr' => [
                    'step' => 1,
                    'min' => $firstYear,
                    'max' => $lastYear,
                ],
                'constraints' => [
                    new LessThanOrEqual($lastYear),
                    new GreaterThanOrEqual($firstYear),
                ],
            ])
            ->add('yearMax', NumberType::class, [
                'html5' => true,
                'label' => 'Max year',
                'scale' => 0,
                'required' => false,
                'attr' => [
                    'step' => 1,
                    'min' => $firstYear,
                    'max' => $lastYear,
                ],
                'constraints' => [
                    new LessThanOrEqual($lastYear),
                    new GreaterThanOrEqual($firstYear),
                ],
            ])
            ->add('mileageMin', NumberType::class, [
                'html5' => true,
                'label' => 'Min mileage',
                'required' => false,
                'attr' => [
                    'step' => 1,
                ],
                'constraints' => [
                    new LessThan(1000000),
                    new GreaterThan(0),
                ],
            ])
            ->add('mileageMax', NumberType::class, [
                'html5' => true,
                'label' => 'Max mileage',
                'required' => false,
                'attr' => [
                    'step' => 1,
                ],
                'constraints' => [
                    new LessThan(1000000),
                    new GreaterThan(0),
                ],
            ])
            ->add('priceMin', NumberType::class, [
                'html5' => true,
                'label' => 'Min price',
                'required' => false,
                'attr' => [
                    'step' => 1,
                ],
                'constraints' => [
                    new LessThan(10000000),
                    new GreaterThan(0),
                ],
            ])
            ->add('priceMax', NumberType::class, [
                'html5' => true,
                'label' => 'Max price',
                'required' => false,
                'attr' => [
                    'step' => 1,
                ],
                'constraints' => [
                    new LessThan(10000000),
                    new GreaterThan(0),
                ],
            ])
            ->add('search', SubmitType::class, [
                'label' => 'Search',
                'attr' => ['class' => 'form-button button btn-success px-5 rounded-0'],
            ])
        ;
    }
}