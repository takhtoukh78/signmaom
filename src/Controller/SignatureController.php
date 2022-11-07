<?php

namespace App\Controller;

use App\Entity\Signature;
use App\Form\SignatureType;
use App\Repository\SignatureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('')]
class SignatureController extends AbstractController
{

    #[Route('/nouvelle_signature', name: 'app_signature_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SignatureRepository $signatureRepository): Response
    {
        $signature = new Signature();
        $form = $this->createForm(SignatureType::class, $signature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $signatureRepository->save($signature, true);
            $Nom = $signature->getNom();
            $prenom = $signature->getPrenom();
            $Poste = $signature->getPoste();
            $Mobile = $signature->getLd();
            $Fix = $signature->getLf();
            $Agence = $signature->getAgence();
            $mail = $signature->getMail();
            $chemin = explode("@",$mail)[0];
            $signature_html = $this->render('signature/signature.html.twig', [
                'signature' => $signature,]);
            $path = 'C:\Users\\'. $chemin .'\AppData\Roaming\Microsoft\Signatures\signaturekmcl.htm';
            $myfile = fopen($path, "w") or die("Unable to open file!");
                fwrite($myfile, $signature_html);
                fclose($myfile);

           return $signature_html;
    }

        return $this->renderForm('signature/new.html.twig', [
            'signature' => $signature,
            'form' => $form,
        ]);
    }


}
