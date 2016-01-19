<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\Common\ClassLoader;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\DriverManager;

use Doctrine\ORM\EntityRepository;
use FOS\UserBundle\Model\UserManagerInterface;
use SwiftMailer\lib\classes\Swift;
use Endroid\QrCode\QrCode;


use AppBundle\Entity\Order;
use AppBundle\Entity\Menu;
use UserBundle\Entity\Utenti;


use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;



class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function loginAction(Request $request)
  {
    $securityContext = $this->container->get('security.authorization_checker');
        $router = $this->container->get('router');

        if ($securityContext->isGranted('ROLE_ADMIN')) {
            return new RedirectResponse($router->generate('menu'), 307);
        }

        if ($securityContext->isGranted('ROLE_USER')) {
            return new RedirectResponse($router->generate('users'), 307);
       }
     }

    /**
     * @Route("/users", name="users")
     */
    public function usersAction(Request $request)
    {

      $order = new Order();
      $formUsers = $this->createFormBuilder($order)
             ->add('primo', ChoiceType::class, array(
               'choices'  => array(
                 '0' => '0',
                 '1' => '1',
                 '2' => '2',
                 '3' => '3',
                 ),
                 // *this line is important*
               'choices_as_values' => true,
             ))
             ->add('secondo', ChoiceType::class, array(
               'choices'  => array(
                 '0' => '0',
                 '1' => '1',
                 '2' => '2',
                 '3' => '3',
                 ),
                 // *this line is important*
               'choices_as_values' => true,
             ))
             ->add('contorno', ChoiceType::class, array(
               'choices'  => array(
                 '0' => '0',
                 '1' => '1',
                 '2' => '2',
                 '3' => '3',
                 ),
                 // *this line is important*
               'choices_as_values' => true,
             ))
             ->add('caffe', ChoiceType::class, array(
               'choices'  => array(
                 '0' => '0',
                 '1' => '1',
                 '2' => '2',
                 '3' => '3',
                 ),
                 // *this line is important*
               'choices_as_values' => true,
             ))
             ->add('acqua', ChoiceType::class, array(
               'choices'  => array(
                 '0' => '0',
                 '1' => '1',
                 '2' => '2',
                 '3' => '3',
                 ),
                 // *this line is important*
               'choices_as_values' => true,
             ))
             ->add('bibita', ChoiceType::class, array(
               'choices'  => array(
                 '0' => '0',
                 '1' => '1',
                 '2' => '2',
                 '3' => '3',
                 ),
                 // *this line is important*
               'choices_as_values' => true,
             ))
             ->add('birra', ChoiceType::class, array(
               'choices'  => array(
                 '0' => '0',
                 '1' => '1',
                 '2' => '2',
                 '3' => '3',
                 ),
                 // *this line is important*
               'choices_as_values' => true,
             ))
             ->add('save', SubmitType::class, array('label' => 'Invio', 'attr' => array('class' => 'sendMenu'), ))
             ->getForm();

             $formUsers->handleRequest($request);
             $error= '';

             if ($formUsers->isSubmitted()) {
          /*     $qrCode = new QrCode();
                $qrCode
                  ->setText("Life is too short to be generating QR codes")
                  ->setSize(300)
                  ->setPadding(10)
                  ->setErrorCorrection('high')
                  ->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0))
                  ->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0))
                  ->setLabel('My label')
                  ->setLabelFontSize(16)
                  ->render();*/
                $em = $this->getDoctrine()->getManager();
                 // ... perform some action, such as saving the task to the database
                 $today = date_create_from_format('Y-m-d H:i', date('Y-m-d H:i'));
                 $user= $this->get('security.token_storage')->getToken()->getUser();
                 $order->setDate($today);
                 $order->setUser($user->getUsername());
                 $order->setTotale($order->getPrimo()*5 + $order->getSecondo()*7 + $order->getContorno()*3 + $order->getCaffe()*1 + $order->getAcqua()*1 + $order->getBibita()*2 + $order->getBirra()*2);
                 $totale= $order->getTotale();
                 $em->persist($order);
                 $em->flush();

                 $message = new \Swift_Message();
                 // Create your file contents in the normal way, but don't write them to disk
          //       $data = $qrCode;

                 // Create the attachment with your data
    //             $attachment = \Swift_Attachment::newInstance($data, 'my-qrcode.pdf', 'application/pdf');
                 $message->setTo($user->getEmail());
                 $message->setFrom('info@tagacafe.it',  'TAG Cafe Order App');
                 $message->setSubject('New order');
      //           $message->attach($attachment);
                 $message->setBody('<html>
                 <head>
                 </head>
                 <body>
                 <img src=' . //$message->embed(\Swift_Image::fromPath('')) .
                   '/>
                   <h2>Ciao Tagger,</h2>
                   <h3>questa è la tua prenotazione:</h3>
                 <h5>Primi: ' . $order->getPrimo() . '</h5>
                 <h5>Secondi: ' . $order->getSecondo() . '</h5>
                 <h5>Contorno: ' . $order->getContorno() . '</h5>
                 <h5>Caffe: ' . $order->getCaffe() . '</h5>
                 <h5>Acqua: ' . $order->getAcqua() . '</h5>
                 <h5>Bibita: ' . $order->getBibita() . '</h5>
                 <h5>Birra: ' . $order->getBirra() . '</h5>
                 <p>
                 Per un totale di: ' . $order->getTotale() . '
                 €</p>' .
          /*    $attachment = Swift_Attachment::newInstance()
              ->setFilename('my-qrcode.pdf')
              ->setContentType('application/pdf')
              ->setBody($data) . '*/
                 ' <h2>Buon appetito!</h2>
                 </body>
                 </html>', 'text/html');

                 $this->get('mailer')->send($message);

                 $repository = $this->getDoctrine()
                     ->getRepository('UserBundle:Utenti');
                  $usersInterested = $repository->findOneById($user->getId());
                  $em = $this->getDoctrine()->getManager();
                  if ($usersInterested->getCredits()>(int)$totale) {
                  $usersInterested->setCredits($usersInterested->getCredits() - (int)$totale); // sottrazione crediti utilizzati
                  $em->persist($usersInterested);
                  $em->flush();
                  $this->addFlash('notice', 'Ordine inviato correttamente');
                  return $this->redirectToRoute('users');
                  } else {
                  $error = "Non hai abbastanza crediti per quest'ordine";
                  }
             }


        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Menu');

          $menu = $repository->findOneBy(['date' => new \DateTime('now')]);
          //var_dump($menu);
            if(!$menu) {
              return $this->render('AppBundle::users.html.twig', array(
              'formUsers' => $formUsers->createView(),
              'menu' => $menu,
            ));
            } else {
                $primiOne = $menu->getPrimiOne();
                $primiTwo = $menu->getPrimiTwo();
                $primiThree = $menu->getPrimiThree();
                $secondOne = $menu->getSecondOne();
                $secondTwo = $menu->getSecondTwo();
                $secondThree = $menu->getSecondThree();
                $sideOne = $menu->getSideOne();
                $sideTwo = $menu->getSideTwo();
                $sideThree = $menu->getSideThree();

                //var_dump($primiOne);die;

        return $this->render('AppBundle::users.html.twig', array(
        'formUsers' => $formUsers->createView(),
        'menu' => $menu,
       'primiOne' => $primiOne,
        'primiTwo' => $primiTwo,
        'primiThree' => $primiThree,
        'secondOne' => $secondOne,
        'secondTwo' => $secondTwo,
        'secondThree' => $secondThree,
        'sideOne' => $sideOne,
        'sideTwo' => $sideTwo,
        'sideThree' => $sideThree,
        'error' => $error,
    ));
  }
}

    /**
     * @Route("/menu", name="menu")
     */
    public function menuAction(Request $request)
    {
        $menu = new Menu();
        $formMenu = $this->createFormBuilder($menu)
        ->add ('primiOne', TextType::class)
        ->add ('primiTwo', TextType::class)
        ->add ('primiThree', TextType::class)
        ->add ('secondOne', TextType::class)
        ->add ('secondTwo', TextType::class)
        ->add ('secondThree', TextType::class)
        ->add ('sideOne', TextType::class)
        ->add ('sideTwo', TextType::class)
        ->add ('sideThree', TextType::class)
        ->add('invio', SubmitType::class, array('label' => 'send', 'attr' => array('class' => 'sendMenu'), ))
        ->getForm();
        $em = $this->getDoctrine()->getManager();

        $formMenu->handleRequest($request);


        if($formMenu->isSubmitted()) {
          $today = date_create_from_format('Y-m-d H:i', date('Y-m-d H:i'));
          $menu->setDate($today);
          $em->persist($menu);
          $em->flush();
        }

        $repository = $this->getDoctrine()
            ->getRepository('AppBundle:Order');

            $em = $this->getDoctrine()->getManager();
            $orders = $repository->findBy(['date' => new \DateTime('now')]);



        // $primo = $orders->getPrimo();
        // $secondo = $orders->getSecondo();
        // $contorno = $orders->getContorno();
        // $acqua = $orders->getAcqua();
        // $bibita = $orders->getBibita();
        // $birra = $orders->getBirra();
        // $caffe = $orders->getCaffe();



        return $this->render('AppBundle::menu.html.twig', array(
        'formMenu' => $formMenu->createView(),
      //   'formImage' => $formImage->createView(),
        'menu' => $menu,
          'orders' => $orders,
        //  'primo' => $primo,
        //  'secondo' => $secondo,
        //  'contorno' => $contorno,
        //  'acqua' => $acqua,
        //  'bibita' => $bibita,
        //  'birra' => $birra,
        //  'caffe' => $caffe,

    ));
    }

    /**
     * @Route("/tabUsers", name="tabUsersGet")
     * @Method({"GET"})
     */
    public function tabUsersGetAction(Request $request)
    {
      $repository = $this->getDoctrine()
          ->getRepository('UserBundle:Utenti');

          $table = $repository->createQueryBuilder('t')
              ->where('t.roles LIKE :role')
              ->setParameter('role', '%ROLE_OPER%')
              ->orderBy('t.username', 'ASC')
              ->getQuery()
              ->getResult();

        return $this->render('AppBundle::tabUsers.html.twig', array(
          'table'   => $table,
        ));
    }

    /**
     * @Route("/tabUsers", name="tabUsersPost")
     * @Method({"POST"})
     */
     public function tabUsersPostAction(Request $request)
     {
         if ($request->get('pk') && $request->get('value') && $request->get('name')) {
           $repository = $this->getDoctrine()
               ->getRepository('UserBundle:Utenti');

               $em = $this->getDoctrine()->getManager();

               $user = $repository->findOneById($request->get('pk'));
               if (!$user){
                 return (new Response())->setContent(json_encode(false));
               }

              $value = $request->get('value');

                   $user
                    ->setCredits($value);
                   $em->persist($user);
                   $em->flush();

             return (new Response())->setContent(json_encode($request->get('value')));
         }


      }

}
