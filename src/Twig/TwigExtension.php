<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class TwigExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('stampaOra', [$this, 'stampaOra']),
        ];
    }

    public function stampaOra()
    {
        $data= date('d-m-Y H:i:s');
        return $data;
    }
}