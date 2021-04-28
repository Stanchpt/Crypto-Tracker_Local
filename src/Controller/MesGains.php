<?php

// src/Controller/Home
namespace App\Controller;

use App\Repository\InvestissementJourRepository;
use App\Services\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class MesGains extends AbstractController
{
    public function index(ChartBuilderInterface $chartBuilder,InvestissementJourRepository $investissementJourRepository): Response
    {
        $dailyResults=$investissementJourRepository->findAll();
        //dd($dailyResults);

        $labels = [];
        $data = [];

        foreach ($dailyResults as $dailyResult)
        {
            $labels[] = $dailyResult->getDateInvest();
            $data[] = $dailyResult->getMontantInvest();
        }

        //dd($labels, $data);

        $chart = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart->setData([
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Mon investissement',
                    'backgroundColor' => 'rgb(31,195,108)',
                    'borderColor' => 'rgb(31,195,108)',
                    'data' => $data,
                ],
            ],
        ]);

        $chart->setOptions([/* ... */]);

        return $this->render('mesgains.html.twig', [
            'chart' => $chart,
        ]);
    }
}