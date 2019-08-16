<?php

namespace AppBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class AppBundle extends AbstractPimcoreBundle
{
    /**
     * @return string[]
     */
    public function getJsPaths(): array
    {
        return [
            '/bundles/app/js/pimcore/startup.js'
        ];
    }
}