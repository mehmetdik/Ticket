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
        return $this->render('NormalUserBundle:MainPage/Ticket:index.html.twig',array('kategoriler'=>$kategoriler));
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


    public function cozKabulAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();

        $ticketid=$request->request->get("ticketid");

        $Ticket=$em->getRepository('NormalUserBundle:Ticket')->find($ticketid);

        $Ticket->setDurum('2');

        $em->persist($Ticket);
        $em->flush();

        $user=$this->getUser();


        $Tickets=$em->getRepository('NormalUserBundle:Ticket')->findBy(array('user'=>$user));
        $kategoriTickets=$em->getRepository('AdminBundle:KategoriTicket')->findAll();

        $yetkiler=$em->getRepository('AdminBundle:Yetkiler')->findAll();
        $cevaplar=$em->getRepository('AdminBundle:Cevaplar')->findAll();

        return $this->render('NormalUserBundle:MainPage:ajaxlistele.html.twig',array('Tickets'=>$Tickets,'KategoriTickets'=>$kategoriTickets,'Yetkiler'=>$yetkiler,'Cevaplar'=>$cevaplar));
    }

    public function cozRedAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $ticketid=$request->request->get("ticketid");

        $Ticket=$em->getRepository('NormalUserBundle:Ticket')->find($ticketid);

        $Ticket->setDurum('0');

        $em->persist($Ticket);
        $em->flush();


        $user=$this->getUser();


        $Tickets=$em->getRepository('NormalUserBundle:Ticket')->findBy(array('user'=>$user));
        $kategoriTickets=$em->getRepository('AdminBundle:KategoriTicket')->findAll();

        $yetkiler=$em->getRepository('AdminBundle:Yetkiler')->findAll();
        $cevaplar=$em->getRepository('AdminBundle:Cevaplar')->findAll();


        return $this->render('NormalUserBundle:MainPage:ajaxlistele.html.twig',array('Tickets'=>$Tickets,'KategoriTickets'=>$kategoriTickets,'Yetkiler'=>$yetkiler,'Cevaplar'=>$cevaplar));

    }

}
