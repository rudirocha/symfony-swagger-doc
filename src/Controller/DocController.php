<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Yaml\Yaml;

class DocController extends Controller
{

    /**
     * @Route("/", name="list_apis")
     */
    public function index()
    {
        return $this->render('doc/index.html.twig');
    }

    /**
     * @Route("/doc/{appName}", name="doc")
     */
    public function nelmioPage($appName)
    {
        $content = Yaml::parse(
            file_get_contents($this->getParameter('kernel.project_dir').'/resources/'.$appName.'/main.yaml')
        );

        return $this->render('@NelmioApiDoc/SwaggerUi/index.html.twig', ['swagger_data' => ['spec' => $content]]);
    }
}
