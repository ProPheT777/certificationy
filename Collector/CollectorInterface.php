<?php
/**
* This file is part of the PhpStorm.
* (c) johann (johann_27@hotmail.fr)
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
**/

namespace Certificationy\Component\Certy\Collector;

interface CollectorInterface extends \Countable
{
    /**
     * @param string $providerName
     * @param array  $resource
     * @return void
     */
    public function addResource($providerName, Array $resource);

    /**
     * @param array $resources
     * @return void
     */
    public function setResources(Array $resources);
    /**
     * @return Resource[]
     */
    public function getResources();

    /**
     * @return string[]
     */
    public function getProvidersName();
}
