<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\FunctionalTestingFramework\Cest\Handlers;

use Magento\FunctionalTestingFramework\ObjectManager\ObjectHandlerInterface;
use Magento\FunctionalTestingFramework\ObjectManagerFactory;
use Magento\FunctionalTestingFramework\Cest\Objects\ActionGroupObject;
use Magento\FunctionalTestingFramework\Cest\Objects\TestObject;
use Magento\FunctionalTestingFramework\Cest\Parsers\ActionGroupDataParser;
use Magento\FunctionalTestingFramework\Cest\Util\ActionGroupObjectExtractor;

/**
 * Class ActionGroupObjectHandler
 */
class ActionGroupObjectHandler implements ObjectHandlerInterface
{
    const BEFORE_AFTER_ERROR_MSG = "Merge Error - Steps cannot have both before and after attributes.\tTestStep='%s'";
    const ACTION_GROUP_ROOT = 'config';
    const ACTION_GROUP = 'actionGroup';

    /**
     * Single instance of class var
     *
     * @var ActionGroupObjectHandler
     */
    private static $ACTION_GROUP_OBJECT_HANDLER;

    /**
     * Array of action groups indexed by name
     *
     * @var array
     */
    private $actionGroups = [];

    /**
     * Singleton getter for instance of ActionGroupObjectHandler
     *
     * @return ActionGroupObjectHandler
     */
    public static function getInstance()
    {
        if (!self::$ACTION_GROUP_OBJECT_HANDLER) {
            self::$ACTION_GROUP_OBJECT_HANDLER = new ActionGroupObjectHandler();
            self::$ACTION_GROUP_OBJECT_HANDLER->initActionGroups();
        }

        return self::$ACTION_GROUP_OBJECT_HANDLER;
    }

    /**
     * ActionGroupObjectHandler constructor.
     */
    private function __construct()
    {
        // private constructor
    }

    /**
     * Function to return a single object by name
     *
     * @param string $actionGroupName
     * @return ActionGroupObject
     */
    public function getObject($actionGroupName)
    {
        if (array_key_exists($actionGroupName, $this->getAllObjects())) {
            return $this->getAllObjects()[$actionGroupName];
        }

        return null;
    }

    /**
     * Function to return all objects for which the handler is responsible
     *
     * @return array
     */
    public function getAllObjects()
    {
        return $this->actionGroups;
    }

    /**
     * Method which populates field array with objects from parsed action_group.xml
     *
     * @return void
     */
    private function initActionGroups()
    {
        $actionGroupParser = ObjectManagerFactory::getObjectManager()->create(ActionGroupDataParser::class);
        $parsedActionGroups = $actionGroupParser->readActionGroupData();

        $actionGroupObjectExtractor = new ActionGroupObjectExtractor();

        foreach ($parsedActionGroups[ActionGroupObjectHandler::ACTION_GROUP_ROOT] as
                 $actionGroupName => $actionGroupData) {
            if (!is_array($actionGroupData)) {
                continue;
            }

            $this->actionGroups[$actionGroupName] =
                $actionGroupObjectExtractor->extractActionGroup($actionGroupData);
        }
    }
}
