<?php

// src/Controller/Home
namespace App\Controller;

use App\Entity\InvestissementJour;
use App\Repository\AjoutTransacRepository;
use App\Repository\DeleteTransacRepository;
use App\Repository\InvestissementJourRepository;
use App\Services\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Home extends AbstractController
{
    public function index(CallApiService $callApiService, DeleteTransacRepository $deletetransac, AjoutTransacRepository $ajouttransac, InvestissementJourRepository $invest_jour): Response
    {
        //dd($callApiService->getDataCrypto());

        // les investissements pour la journée

        $montant_ajout = $ajouttransac->findMontantAjouteDQL();
        $montant_aj = $montant_ajout[0]['prixajoute'];
        //dd($montant_ajout);

        $montant_delete = $deletetransac->findMontantSupprimerDQL();
        $montant_del = $montant_delete[0]['montant_suppr'];
        //dd($montant_delete[0]['montant_suppr']);

        $inves_= $montant_aj - $montant_del;
        //dd($inves_);

        $date_now = date("Y-m-d");
        //$date_now = "2021-04-29";
        //dd($date_now);
        $dn = strval($date_now);
        //dd($dn);

        $invest_rep= $invest_jour->findinvestjourDQL();
        if ($invest_rep != NULL)
        {
            $invest_date = $invest_rep[0]["date_invest"];
        }
        //dd($invest_date);
        else
        {
            $invest_date = NULL;
        }

        $nbinvest = $invest_jour->findnbjourDQL($date_now);
        $nb = $nbinvest[0][1];

        //$n= gettype($nb);

        //dd($invest_date, $date_now, $n);
        //enregristrement de l'investissement journalier
        if($nb != 1)
        {
                $oinvest = new InvestissementJour();
                $oinvest->setMontantInvest($inves_);
                $oinvest->setDateInvest($date_now);

                $em = $this->getDoctrine()->getManager();

                $em->persist($oinvest);
                $em->flush();
        }
        return $this->render('base.html.twig',[
            'data_crypto'=>$callApiService->getDataCrypto(),
            'montant_investissement' => $inves_
        ]);
    }
}