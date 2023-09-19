<?php

namespace App\Repository;

use App\Entity\Etudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Etudiant>
 *
 * @method Etudiant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Etudiant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Etudiant[]    findAll()
 * @method Etudiant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Etudiant::class);
    }

    // Méthode permettant de rechercher étudiant mineur
    public function findMineurs() : array {
        // Utiliser le langage DQL : exprimer des requêtes se basant sur le modèle objet (entité)
        // La requête DQL sera transformé en une requête SQL par Doctrine
        // lors de l'exécution de la méthode

        $dateMajorite = new \DateTime('-18 years');
        // 1. Exprimer ma requête DQL
        $requeteDQL = "SELECT etudiant FROM App\Entity\Etudiant as etudiant WHERE etudiant.dateNaissance > :dateMajorite";
        // 2. Contruire ma requête represnetaiton objet de la requete
        $requete = $this->getEntityManager()->createQuery($requeteDQL);
        // 3. Donner une valeur à paramètre de la requête
        $requete->setParameter('dateMajorite',$dateMajorite);
        // 4. Excéuter la requête et retourner le resultat
        /*dd($requete->getSQL());*/
        return $requete->getResult();
    }



    // Version 2 ^|

    public function findMineurs2 () : array {
        // Utiliser le Query builder : permettant de construire
        // dynamyquement des requete DQL
        $dateMajorite = new \DateTime('-18 years');



        return $this->createQueryBuilder('e')
                    ->where('e.dateNaissance' > $dateMajorite)
                    ->setParameter('dateMajorite', $dateMajorite)
                    ->getQuery()
                    ->getResult();
    }





//    /**
//     * @return Etudiant[] Returns an array of Etudiant objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Etudiant
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
