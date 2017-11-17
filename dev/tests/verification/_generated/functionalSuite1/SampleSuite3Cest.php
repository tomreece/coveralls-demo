<?php
namespace Magento\AcceptanceTest\functionalSuite1\Backend;

use Magento\FunctionalTestingFramework\AcceptanceTester;
use Magento\FunctionalTestingFramework\DataGenerator\Handlers\DataObjectHandler;
use Magento\FunctionalTestingFramework\DataGenerator\Persist\DataPersistenceHandler;
use Magento\FunctionalTestingFramework\DataGenerator\Objects\EntityDataObject;
use \Codeception\Util\Locator;
use Yandex\Allure\Adapter\Annotation\Features;
use Yandex\Allure\Adapter\Annotation\Stories;
use Yandex\Allure\Adapter\Annotation\Title;
use Yandex\Allure\Adapter\Annotation\Description;
use Yandex\Allure\Adapter\Annotation\Parameter;
use Yandex\Allure\Adapter\Annotation\Severity;
use Yandex\Allure\Adapter\Model\SeverityLevel;
use Yandex\Allure\Adapter\Annotation\TestCaseId;

/**
 */
class SampleSuite3Cest
{
	/**
	 * @group include
	 * @Parameter(name = "AcceptanceTester", value="$I")
	 * @param AcceptanceTester $I
	 * @return void
	 */
	public function IncludeTest(AcceptanceTester $I)
	{
		$I->amOnPage("/someUrl");
		$I->see(".someSelector");
		$I->click(".clickable");
		$I->fillField(".fillable");
	}
}
