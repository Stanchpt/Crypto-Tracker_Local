<?php

// src/Controller/Add
namespace App\Controller;

use App\Entity\AjoutTransac;
use App\Form\AjoutTransacType;
use App\Services\CallApiService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class Add extends AbstractController
{
    public function index(Request $request): Response
    {

        $form = $this->createForm(AjoutTransacType::class);
        $form->handleRequest($request);

        //si le formulaire a été soumis
        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            $crypto = $data['Selectionner_une_crypto'];
            $quantite = $data['Quantite'];
            $Prixdachat = $data['Prixdachat'];

            $ajouttransac = new AjoutTransac();
            $ajouttransac->setNomcrypto($crypto);
            $ajouttransac->setQuantite($quantite);
            $ajouttransac->setPrixdachat($Prixdachat);

            $em = $this->getDoctrine()->getManager();

            $em->persist($ajouttransac);
            $em->flush();

            //dd($data);

            /*$this->addFlash(
                'notice',
                'L\'ajout des données s\'est bien passées'
            );*/

            return $this->redirectToRoute('Home');
        }

        //$list_crypto = $callApiService->getDataCrypto();
        return $this->render('add.html.twig',
            [  'form' => $form->createView()
            ]);
    }
}