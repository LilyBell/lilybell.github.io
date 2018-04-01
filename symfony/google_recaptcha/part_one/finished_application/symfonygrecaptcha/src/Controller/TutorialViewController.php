<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TutorialViewController extends Controller
{
    /**
     * @Route("/tutorial/view", name="tutorial_view")
     */
    public function index()
    {
        return $this->render('tutorial_view/index.html.twig', [
            'controller_name' => 'TutorialViewController',
        ]);
    }
}
