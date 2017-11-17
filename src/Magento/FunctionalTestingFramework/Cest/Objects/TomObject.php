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

    public function someNewPublicFunction()
    {
        if (true) {
            return true;
        }
    }

    private function someNewPrivateFunction()
    {
        for ($i = 0; $i < 2; $i++) {
            if (1 == 1) {
                if (true) {
                    echo "coverAlls!";
                }
            } else {
                echo "soItGoes";
            }
        }
        return null;
    }
}
