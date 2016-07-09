<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\RegisterType;
use AppBundle\Entity\Register;

class LearnController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
	{
	    $register = new Register();
	    $form = $this->createForm(RegisterType::class, $register);

	    $form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {	    
	    $em = $this->getDoctrine()->getManager();
		$em->persist($register);
		$em->flush();
		return $this->redirectToRoute('register');
		}
        return $this->render('main/learn.html.twig', array(
            'form' => $form->createView(),
        ));
	}
	

}