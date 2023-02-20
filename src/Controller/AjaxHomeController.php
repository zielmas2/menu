<?php

namespace App\Controller;

use App\Entity\Menu;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AjaxHomeController extends AbstractController
{
    #[Route('/ajax-home', name: 'app_ajax_form_input')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $name = $request->get('name');

        $entityManager = $doctrine->getManager();
        $menu = new Menu();
        $menu->setUrl($name);
        $entityManager->persist($menu);
        $entityManager->flush();

        return $this->render('ajax_home/index.html.twig', [
            'controller_name' => 'AjaxHomeController',
        ]);
    }

    #[Route('/ajax-form-save', name: 'app_ajax_form_save')]
    public function ajaxFormSave(Request $request, ManagerRegistry $doctrine): Response
    {
        $response = new Response();

        $name = $request->get('name');
        //$password = $request->get('password');

        //...


        /*$entityManager = $doctrine->getManager();
        $menu = new Menu();
        $menu->setUrl($name);
        $entityManager->persist($menu);
        $entityManager->flush();*/

        return $response;
    }
}
