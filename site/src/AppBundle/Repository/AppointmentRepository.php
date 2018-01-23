<?php

namespace AppBundle\Repository;

use UserBundle\Entity\Doctor;
use UserBundle\Entity\User;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * AppointmentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AppointmentRepository extends EntityRepository
{
    public function getAvailableAppointmentsQueryBuilder() : QueryBuilder
    {
        return $this->createQueryBuilder('a')
            ->where('a.user IS NULL');
    }

    public function getAppointmentsByDoctorQueryBuilder(Doctor $doctor)
    {
        return $this->createQueryBuilder('a')
            ->innerJoin('a.office', 'o')
            ->innerJoin('o.doctor', 'd')
            ->where('d = :doctor')
            ->setParameter(':doctor', $doctor);
    }
}
