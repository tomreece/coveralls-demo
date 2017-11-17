<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\FunctionalTestingFramework\Cest\Objects;

use Magento\FunctionalTestingFramework\Cest\Handlers\ActionGroupObjectHandler;
use Magento\FunctionalTestingFramework\Cest\Util\ActionMergeUtil;
use Magento\FunctionalTestingFramework\Cest\Util\ActionObjectExtractor;

/**
 * Class TomObject
 */
class TomObject
{
    /**
     * TomObject constructor.
     */
    public function __construct()
    {
        return null;
    }

    /**
     * this is a docstring
     * @return bool
     */
    public function someNewPublicFunction()
    {
        if (true) {
            $this->someNewPrivateFunction();
            return true;
        }
    }

    /**
     * this is a docstring
     * @return null
     */
    private function someNewPrivateFunction()
    {
        for ($i = 0; $i < 2; $i++) {
            if (1 == 1) {
                if (true) {
                    echo "farnsworth";
                }
            } else {
                echo "fry";
            }
        }
        return null;
    }
}
