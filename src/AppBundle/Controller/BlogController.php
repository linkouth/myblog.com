<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use \AppBundle\Entity\Student;
use \AppBundle\Entity\Candidate;
use \AppBundle\Form\CandidateType;


class BlogController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $navigation = array(
            'home', 'About me', 'Projects', 'Contact'
        );
        $header = array(
            'speciality' => 'Web-developer',
            'name' => 'Barsik Keksov'
        );

        $entityManager = $this->getDoctrine()->getManager();

        $superStudent = new Student('Ivan', 'Petrov', 20);

        $entityManager->persist($superStudent);

        $entityManager->flush();

        return $this->render('blog.html.twig', array('superStudent' => $superStudent));
    }

    /**
     * @Route("/show", name="show")
     */
    public function showAction()
    {
        $repository = $this->getDoctrine()->getRepository(Student::class);

        $students = $repository->findAll();

        return $this->render('show.html.twig', array('students' => $students));
    }

    /**
     * @Route("/addStudent")
     */
    public function addStudentAction(Request $request)
    {
        $newStudent = new Student();

        $form = $this->createFormBuilder($newStudent)
            ->add('name', TextType::class)
            ->add('surname', TextType::class)
            ->add('age', TextType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newStudent = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($newStudent);
            $entityManager->flush();

            return $this->redirectToRoute('show');
        }

        return $this->render('projects.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/cv")
     */
    public function addProjectAction(Request $request) {
        $newCandidate = new Candidate();

        $form = $this->createForm(CandidateType::class, $newCandidate);

        return $this->render('cv.html.twig', array(
           'form' => $form->createView()
        ));
    }
}
