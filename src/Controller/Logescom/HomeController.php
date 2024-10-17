<?php

namespace App\Controller\Logescom;

use App\Entity\Entreprise;
use App\Entity\LieuxVentes;
use App\Repository\ClientRepository;
use App\Repository\ConfigurationLogicielRepository;
use App\Repository\DeviseRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\LicenceRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\LieuxVentesRepository;
use App\Repository\MouvementCollaborateurRepository;
use App\Repository\RegionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/logescom/home', name: 'app_logescom_home')]
    public function index(EntrepriseRepository $entrepriseRep, LicenceRepository $licenceRep, LieuxVentesRepository $lieuxVentesRep, MouvementCollaborateurRepository $mouvementColabRep, ClientRepository $clientRep, DeviseRepository $deviseRep, RegionRepository $regionRep, Request $request, ConfigurationLogicielRepository $configurationLogicielRep): Response
    {
        $user = $this->getUser();
        if (!$user) {
            // Utilisateur non connecté, redirection vers la page de connexion
            return new RedirectResponse($this->generateUrl('app_login'));
        }
        if ($this->isGranted('ROLE_ADMIN') or $this->isGranted('ROLE_DEVELOPPEUR') || $this->isGranted('ROLE_RESPONSABLE')) { 
            $lieux_ventes = $lieuxVentesRep->findAll();
        } else {
            $lieux_ventes = $lieuxVentesRep->findBy(['id' => $user->getLieuVente()->getId()]);
        }

        $licence = $licenceRep->findOneBy([]);
        // Supposons que vous avez un objet Licence avec les propriétés dateFin (DateTime)
        $dateActuelle = new \DateTime();
        $alerteExpiration = false;
        $licenceExpiree = false;

        // Vérifier si la licence est déjà expirée
        if ($licence->getTypeLicence() == 'illimité') {
            $licenceExpiree = false;
        }elseif ($licence->getDateFin() < $dateActuelle) {
            $licenceExpiree = true;
        } else {
            // Calculer la différence entre la date actuelle et la date d'expiration
            $interval = $licence->getDateFin()->diff($dateActuelle);

            // Vérifier si la licence expire dans un mois ou moins
            if ($interval->invert == 1 && $interval->days <= 30) {
                // La licence expire dans moins d'un mois
                $alerteExpiration = true;
            }
        }

        if ($request->get("id_client_search")){
            $search = $request->get("id_client_search");
        }else{
            $search = "";
        }

        $type1 = $request->get('type1') ? $request->get('type1') : 'client';
        $type2 = $request->get('type2') ? $request->get('type2') : 'client-fournisseur';

        if ($request->get("limit")){
            $limit = $request->get("limit");
        }else{
            $limit = 45;
        } 
        $regions = $regionRep->findBy([], ['nom' => 'ASC']);
        $devises = $deviseRep->findBy(['id' => 1]);
        
        $clients = $clientRep->listeDesClientsGeneralParType($type1, $type2);  
        
        $comptesInactifs = [];
        foreach ($clients as $client) {
            $soldes = $mouvementColabRep->comptesInactif($client->getUser(), $limit, $devises);
            if ($soldes) {
                $comptesInactifs[] = [
                    'collaborateur' => $client->getUser(),
                    'soldes' => $mouvementColabRep->comptesInactif($client->getUser(), $limit, $devises),
                    'derniereOp' => $mouvementColabRep->findOneBy(['collaborateur' => $client->getUser()], ['id' => 'DESC'])
                ];
            }
        }

        // dd($comptesInactifs);

        if ($request->get("region")){
            $region_find = $regionRep->find($request->get("region"));
        }else{
            $region_find = array();
        }

        
        // dd($comptesInactifs);
        return $this->render('logescom/home/index.html.twig', [
            'entreprise' => $entrepriseRep->find(1),
            'lieux_ventes' => $lieux_ventes,
            'config' => $configurationLogicielRep->findOneBy([]),
            'licence' => $licence,
            'alerteExpiration' => $alerteExpiration,
            'licenceExpiree' => $licenceExpiree,
            'search' => $search,
            'comptes' => $comptesInactifs,
            'devises'   => $devises,
            'regions' => $regions,
            'region_find' => $region_find,
            'type1' => $type1,
            'type2' => $type2,
            'limit' => $limit,

        ]);
    }

    #[Route('/lieuvente/{id}', name: 'app_logescom_home-lieuvente', methods: ['GET', 'POST'])]
    public function homeLieuVente(LieuxVentes $lieuxVentes, Request $request, EntrepriseRepository $entrepriseRep, EntityManagerInterface $entityManager): Response
    {
        return $this->render('logescom/home/choix.html.twig', [
            'entreprise' => $entrepriseRep->find(1),
            'lieu_vente' => $lieuxVentes,
        ]);
    }
}
