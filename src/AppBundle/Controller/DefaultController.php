<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Product;
use AppBundle\Entity\Category;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repoP = $em->getRepository('AppBundle:Product');

        $products = $repoP->findAll();
        // replace this example code with whatever you need
        return [
            'products' => $products
        ];
    }

    /**
     * @Route("/save", name="save")
     */
    public function saveAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repoC = $em->getRepository('AppBundle:Category');
        $repoP = $em->getRepository('AppBundle:Product');

        $product = $repoP->find(3);

        $product->setCategory($repoC->findOneById(2));

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        return new Response('Product Created');
    }

    /**
     * @Route("/update/{id}", name="update")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository();
        $category = new Category();
        $category->setName('Pakaian');

        $product = new Product();
        $product->setName('T-shirt Hijau');
        $product->setPrice(100000);
        $product->setDescription('Bagus sekali');

        $product->setCategory($category);

        $em->persist($category);
        $em->persist($product);
        $em->flush();

        return new Response('Product Created');
    }
}
