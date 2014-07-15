<?php
/**
* This file is part of the PhpStorm.
* (c) johann (johann_27@hotmail.fr)
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
**/

namespace Certificationy\Component\Certy\Builder;

use Certificationy\Component\Certy\Collector\CollectorInterface;
use Certificationy\Component\Certy\Context\CertificationContext;

interface BuilderPassInterface
{
    /**
     * @param Builder              $builder
     * @param CertificationContext $certificationContext
     */
    public function execute(Builder $builder, CertificationContext $certificationContext);

    /**
     * @param CollectorInterface $collector
     */
    public function setCollector(CollectorInterface $collector);
}
