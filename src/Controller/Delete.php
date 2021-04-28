<?php

// src/Controller/Add
namespace App\Controller;

use App\Entity\AjoutTransac;
use App\Entity\DeleteTransac;
use App\Form\AjoutTransacType;
use App\Form\DeleteTransacType;
use App\Services\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class Delete extends AbstractController
{
    public function index(Request $request): Response
    {
        //dd($callApiService->getDataCrypto());

        $form = $this->createForm(DeleteTransacType::class);

        $form->handleRequest($request);

        //si le formulaire a été soumis
        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            $crypto = $data['Selectionner_une_crypto'];
            $quantite = $data['Quantite_de_crypto'];
            $Prixdachat = $data['Prix_de_la_transaction'];

            $deletetransac = new DeleteTransac();
            $deletetransac->setNomCrypto($crypto);
            $deletetransac->setQuantiteTrans($quantite);
            $deletetransac->setPrixTransac($Prixdachat);

            $em = $this->getDoctrine()->getManager();

            $em->persist($deletetransac);
            $em->flush();

            //dd($data);

            /*$this->addFlash(
                'notice',
                'La suppression de la transaction s\'est bien passées'
            );*/

            return $this->redirectToRoute('Home');
        }

        return $this->render('delete.html.twig', [
                'form' => $form->createView()
        ]);
    }

}