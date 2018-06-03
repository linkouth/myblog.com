<?php
/**
 * Created by PhpStorm.
 * User: linkouth
 * Date: 01.06.18
 * Time: 17:01
 */

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky")
     */
    public function numberAction()
    {
        $number = mt_rand(0, 100);

        return new Response(
            '<html><body>Your lucky number: '.$number.'</body></html>'
        );
    }
}