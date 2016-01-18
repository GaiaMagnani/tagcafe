<?
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\ChoiceList\View\ChoiceView;
use Symfony\Component\Form\SubmitButtonTypeInterface;
use Symfony\Component\Form\FormView;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('firstPlate', ChoiceType::class, array(
          'choices'  => array(
            '0' => null,
            '1' => true,
            '2' => true,
            '3' => true,
            ),
            // *this line is important*
          'choices_as_values' => true,
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Order'
        ));
    }
}
