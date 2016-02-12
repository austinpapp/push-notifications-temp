<?php

namespace Civix\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

class StatesRepository extends EntityRepository
{
    public function getStatesWithSTRepresentative()
    {
        return $this->getEntityManager()
            ->createQueryBuilder()
            ->select('st, COUNT(rs) AS stcount, MIN(rs.updatedAt) as lastUpdatedAt')
            ->from('CivixCoreBundle:State', 'st')
            ->leftJoin('st.stRepresentatives', 'rs')
            ->groupBy('st.code, rs.state')
            ->orderBy('lastUpdatedAt', 'DESC')
            ->addOrderBy('st.code', 'ASC')
            ->getQuery();
    }
}
