<?php

namespace App\Controller;

use App\Classe\Cart;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/mon-panier', name: 'cart')]
    public function index(Cart $cart)
    {
      
        return $this->render('cart/index.html.twig', [
            'cart' => $cart->getFull()
        ]);
    }

    #[Route('/cart/add/{id}', name: 'add_to_cart')]
    public function add(Cart $cart, Request $request , $id)
    {
        $cart->add($id);
        $this->addFlash(
            'success',
            'Votre article a bien été ajouté au panier',
        ); 
        $referer = $request->headers->get('referer');
        return $this->redirect($referer);   
    }

    #[Route("/cart/remove", name: "remove_my_cart")]
    public function remove(Cart $cart )
    {
        $cart->remove();
        return $this->redirectToRoute('products');
    }

    #[Route("/cart/delete{id}", name: "delete_to_cart")]
    public function delete(Cart $cart, $id)
    {
        $cart->delete($id);
        return $this->redirectToRoute('cart');
    }
    #[Route("/cart/decrease/{id}", name: "decrease_to_cart")]
    public function decrease(Cart $cart, $id)
    {
        $cart->decrease($id);
        return $this->redirectToRoute('cart');
    }

}