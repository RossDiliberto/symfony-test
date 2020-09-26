<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

class FunzioniController extends AbstractController
{
    /**
     * @Route("/prova-symfony", name="prova-symfony")
     */
    public function index(KernelInterface $kernel)
    {
        $application = new Application($kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput(array(
            'command' => 'random'
        ));

        $output = new BufferedOutput();
        $application->run($input, $output);

        $numero = $output->fetch();

        
        return $this->render('/prova-symfony.html.twig', [
            'numero_casuale' => $numero
        ]);
    }
}