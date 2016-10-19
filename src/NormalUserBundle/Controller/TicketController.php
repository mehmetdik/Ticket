<?php

namespace NormalUserBundle\Controller;

use NormalUserBundle\Entity\Ticket;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;




class TicketController extends Controller
{
    public function indexAction()
    {
        return $this->render('NormalUserBundle:MainPage:index.html.twig');
    }
    public function ekleAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();

        $baslik=$request->request->get('baslik');
        $metin=$request->request->get('metin');
        $kategori=$request->request->get('kategori');
        $onem=$request->request->get('onem');
        $dosya=$request->request->get('dosya');

        $ticket=new Ticket();
        $ticket->setBaslik($baslik);
        $ticket->setMetin($metin);
        $ticket->setKategori($kategori);
        $ticket->setOnemDerecesi($onem);
        $ticket->setDosya($dosya);

        $em->persist($ticket);
        $em->flush();

     //   $tickets=$em->getRepository('NormalUserBundle:Ticket')->findAll();

        return new Response('Ticket Eklendi');
       // return $this->render('NormalUserBundle:MainPage/Ticket:index.html.twig',array('tickets'=>$tickets));



    }

}
