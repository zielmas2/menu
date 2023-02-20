<?php

namespace App\Controller;

use App\Entity\Menu;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();



        $menu = new Menu();
        $menu->setUrl('deneme');
        //$menu->setCreatedAt(strtotime(date('Y-m-d H:i:s')));
        //var_dump($menu);
        $entityManager->persist($menu);
        $entityManager->flush();
        var_dump('aaa');

        $menuEntity = $entityManager->getRepository(Menu::class)->find(3);
        //$menuUpdate = $menuEntity->find(1);
        $menuEntity->setUrl('deneme-yap');
        $entityManager->flush();

        $menuEntity = $entityManager->getRepository(Menu::class)->find(2);
        if ($menuEntity) {
            $entityManager->remove($menuEntity);
            $entityManager->flush();
        }


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/form-input', name: 'app_form_input')]
    public function formInput(): Response
    {





        return $this->render('home/form_input.html.twig', [
            'name' => 'Ziya',
        ]);
    }
}
