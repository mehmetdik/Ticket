<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Cevaplar;
use AdminBundle\Entity\Kategori;
use AdminBundle\Entity\Yetkiler;
use Symfony\Bridge\Twig\Extension\RoutingExtension;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use NormalUserBundle\Entity\Ticket;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminTicketController extends Controller
{
    public function indexAction()
    {
        $em=$this->getDoctrine()->getManager();

        $Tickets=$em->getRepository('NormalUserBundle:Ticket')->findAll();
        $kategoriTickets=$em->getRepository('AdminBundle:KategoriTicket')->findAll();
        $kullanicilar=$em->getRepository('UserBundle:User')->findAll();
        $yetkiler=$em->getRepository('AdminBundle:Yetkiler')->findAll();
        $cevaplar=$em->getRepository('AdminBundle:Cevaplar')->findAll();

        return $this->render('AdminBundle:MainPage:listle.html.twig',array('Tickets'=>$Tickets,'KategoriTickets'=>$kategoriTickets,'Kullanicilar'=>$kullanicilar,'Yetkiler'=>$yetkiler,'Cevaplar'=>$cevaplar));
    }
    public function kategoriAction()
    {
        return $this->render('AdminBundle:MainPage:kategori.html.twig');
    }

    public function kategoriEkleAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();

        $kategoriad=$request->request->get('kategori');

        $kategori=new Kategori();
        $kategori->setKategori($kategoriad);

        $em->persist($kategori);
        $em->flush();

        //   $tickets=$em->getRepository('NormalUserBundle:Ticket')->findAll();

        return new Response('Kategori Eklendi');

    }

    public function cozAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();

        $ticketid=$request->request->get("ticketid");

        $ticket=$em->getRepository("NormalUserBundle:Ticket")->find($ticketid);

        $ticket->setDurum("1");

        $em->persist($ticket);
        $em->flush();


        $Tickets=$em->getRepository('NormalUserBundle:Ticket')->findAll();
        $kategoriTickets=$em->getRepository('AdminBundle:KategoriTicket')->findAll();

        $yetkiler=$em->getRepository('AdminBundle:Yetkiler')->findAll();
        $cevaplar=$em->getRepository('AdminBundle:Cevaplar')->findAll();



        return $this->render('AdminBundle:MainPage:ajaxlistele.html.twig',array('Tickets'=>$Tickets,'KategoriTickets'=>$kategoriTickets,'Yetkiler'=>$yetkiler,'Cevaplar'=>$cevaplar));
    }

    public function yetkiliSecAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();

        $kullaniciid=$request->request->get("yetkiliSecim");
        $ticketid=$request->request->get("ticketid");

        $kullanici=$em->getRepository("UserBundle:User")->find($kullaniciid);
        $ticket=$em->getRepository("NormalUserBundle:Ticket")->find($ticketid);


        $yetki=new Yetkiler();
        $yetki->setTicket($ticket);
        $yetki->setUser($kullanici);

        $em->persist($yetki);
        $em->flush();

        $Tickets=$em->getRepository('NormalUserBundle:Ticket')->findAll();
        $kategoriTickets=$em->getRepository('AdminBundle:KategoriTicket')->findAll();
        $yetkiler=$em->getRepository('AdminBundle:Yetkiler')->findAll();
        $cevaplar=$em->getRepository('AdminBundle:Cevaplar')->findAll();



        return $this->render('AdminBundle:MainPage:ajaxlistele.html.twig',array('Tickets'=>$Tickets,'KategoriTickets'=>$kategoriTickets,'Yetkiler'=>$yetkiler,'Cevaplar'=>$cevaplar));



    }

    public function myModalDoldurAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();

        $tickedid=$request->request->get("ticketid");

        $ticket=$em->getRepository('NormalUserBundle:Ticket')->find($tickedid);

        $kullanicilar=$em->getRepository('UserBundle:User')->findAll();

        $yetkiler=$em->getRepository('AdminBundle:Yetkiler')->findAll();


        return $this->render('AdminBundle:MainPage:ajaxModalDoldur.html.twig',array('Ticket'=>$ticket,'Kullanicilar'=>$kullanicilar,'Yetkiler'=>$yetkiler));


    }

    public function ticketCevaplaModalAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();

        $ticketid=$request->request->get("ticketid");

        $ticket=$em->getRepository("NormalUserBundle:Ticket")->find($ticketid);

        return $this->render('AdminBundle:MainPage:ticketCevaplaModal.html.twig',array('Ticket'=>$ticket));

    }


    public function ticketCevaplaAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();

        $ticketid=$request->request->get("ticketid");
        $metin=$request->request->get("cevap");

        $ticket=$em->getRepository("NormalUserBundle:Ticket")->find($ticketid);
        $cevap=new Cevaplar();
        $cevap->setMetin($metin);
        $cevap->setTicket($ticket);

        $em->persist($cevap);
        $em->flush();


        $Tickets=$em->getRepository('NormalUserBundle:Ticket')->findAll();
        $kategoriTickets=$em->getRepository('AdminBundle:KategoriTicket')->findAll();
        $yetkiler=$em->getRepository('AdminBundle:Yetkiler')->findAll();
        $cevaplar=$em->getRepository('AdminBundle:Cevaplar')->findAll();



        return $this->render('AdminBundle:MainPage:ajaxlistele.html.twig',array('Tickets'=>$Tickets,'KategoriTickets'=>$kategoriTickets,'Yetkiler'=>$yetkiler,'Cevaplar'=>$cevaplar));

    }


    public function ticketCevapGorAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();

        $ticketid=$request->request->get("ticketid");

        $ticket=$em->getRepository("NormalUserBundle:Ticket")->find($ticketid);

        $cevap=$em->getRepository("AdminBundle:Cevaplar")->findOneBy(array('ticket'=>$ticket));

        return $this->render('AdminBundle:MainPage:ticketCevapGor.html.twig',array('Ticket'=>$ticket,'cevap'=>$cevap));

    }




}
