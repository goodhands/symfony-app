<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\Type\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;        
    }

    /**
     * @Route("/register", name="user.register")
     */
    public function create(Request $request)
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user->setPassword( 
                $this->passwordEncoder->encodePassword( $user, "samiel" )
            );

            $user = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('dashboard');
        }

        return $this->render('register.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}
