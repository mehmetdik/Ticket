<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RoleController extends Controller
{
    /**
     * @Route("/index")
     */
    public function indexAction()
    {
        $em=$this->getDoctrine()->getManager();




        $user=$this->getUser();

        $TicketsUser=$em->getRepository('NormalUserBundle:Ticket')->findBy(array('user'=>$user));
        $counterTicketsUser=count($TicketsUser);

        $TicketCozulmusUser=$em->getRepository('NormalUserBundle:Ticket')->findBy(array('user'=>$user,'durum'=>'2'));
        $counterCozulmusUser=count($TicketCozulmusUser);

        $TicketBekleyenUser=$em->getRepository('NormalUserBundle:Ticket')->findBy(array('user'=>$user,'durum'=>'1'));
        $counterBekleyenUser=count($TicketBekleyenUser);

        $TicketAcikUser=$em->getRepository('NormalUserBundle:Ticket')->findBy(array('user'=>$user,'durum'=>'0'));
        $counterAcikUser=count($TicketAcikUser);


        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {

            $Tickets=$em->getRepository('NormalUserBundle:Ticket')->findAll();
            $counterTickets=count($Tickets);

            $TicketCozulmus=$em->getRepository('NormalUserBundle:Ticket')->findBy(array('durum'=>'2'));
            $counterCozulmus=count($TicketCozulmus);

            $TicketBekleyen=$em->getRepository('NormalUserBundle:Ticket')->findBy(array('durum'=>'1'));
            $counterBekleyen=count($TicketBekleyen);

            $TicketAcik=$em->getRepository('NormalUserBundle:Ticket')->findBy(array('durum'=>'0'));
            $counterAcik=count($TicketAcik);


            return $this->render('AdminBundle:MainPage:index.html.twig',array('counterTickets'=>$counterTickets,'counterCozulmus'=>$counterCozulmus,'counterBekleyen'=>$counterBekleyen,'counterAcik'=>$counterAcik));
        }else{
            $KategoriTickets=$em->getRepository('AdminBundle:KategoriTicket')->findAll();
            $Yetkiler=$em->getRepository('AdminBundle:Yetkiler')->findAll();
            $Cevaplar=$em->getRepository('AdminBundle:Cevaplar')->findAll();
            return $this->render('NormalUserBundle:MainPage:index.html.twig',array('counterTicketsUser'=>$counterTicketsUser,'counterCozulmusUser'=>$counterCozulmusUser,'counterBekleyenUser'=>$counterBekleyenUser,'counterAcikUser'=>$counterAcikUser,'Tickets'=>$TicketsUser,'KategoriTickets'=>$KategoriTickets,'Yetkiler'=>$Yetkiler,'Cevaplar'=>$Cevaplar));
        }

    }

}
