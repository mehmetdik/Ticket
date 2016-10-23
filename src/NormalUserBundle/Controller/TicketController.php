<?php

namespace NormalUserBundle\Controller;

use AdminBundle\Entity\KategoriTicket;
use NormalUserBundle\Entity\Ticket;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;




class TicketController extends Controller
{
    public function indexAction()
    {
        $em=$this->getDoctrine()->getManager();

        $kategoriler=$em->getRepository('AdminBundle:Kategori')->findAll();
        return $this->render('NormalUserBundle:MainPage:index.html.twig',array('kategoriler'=>$kategoriler));
    }
    public function ekleAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();

        $baslik=$request->request->get('baslik');
        $metin=$request->request->get('metin');
        $kategoriobj=$request->request->get('kategori');
        $onem=$request->request->get('onem');
        $dosya=$request->request->get('dosya');

        $dilimler = explode(",", $kategoriobj);



        $user=$this->getUser();
        $tarih=new \DateTime("now");


        $ticket=new Ticket();
        $ticket->setUser($user);
        $ticket->setBaslik($baslik);
        $ticket->setMetin($metin);
        $ticket->setDurum("0");
        $ticket->setOnemDerecesi($onem);
        $ticket->setDosya($dosya);
        $ticket->setTarih($tarih);

        $em->persist($ticket);

        foreach($dilimler as $dilim)
        {
            $kategori=$em->getRepository('AdminBundle:Kategori')->find($dilim);
            $kategoriticket=new KategoriTicket();
            $kategoriticket->setKategori($kategori);
            $kategoriticket->setTicket($ticket);
            $em->persist($kategoriticket);

        }

        $em->flush();

     //   $tickets=$em->getRepository('NormalUserBundle:Ticket')->findAll();

        return new Response('Ticket Eklendi');
       // return $this->render('NormalUserBundle:MainPage/Ticket:index.html.twig',array('tickets'=>$tickets));



    }

}
