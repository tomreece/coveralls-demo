<?php
namespace Magento\AcceptanceTest\_generated\Backend;

use Magento\FunctionalTestingFramework\AcceptanceTester;
use Magento\FunctionalTestingFramework\DataGenerator\Handlers\DataObjectHandler;
use Magento\FunctionalTestingFramework\DataGenerator\Persist\DataPersistenceHandler;
use Magento\FunctionalTestingFramework\DataGenerator\Objects\EntityDataObject;
use Yandex\Allure\Adapter\Annotation\Features;
use Yandex\Allure\Adapter\Annotation\Stories;
use Yandex\Allure\Adapter\Annotation\Title;
use Yandex\Allure\Adapter\Annotation\Description;
use Yandex\Allure\Adapter\Annotation\Parameter;
use Yandex\Allure\Adapter\Annotation\Severity;
use Yandex\Allure\Adapter\Model\SeverityLevel;
use Yandex\Allure\Adapter\Annotation\TestCaseId;

/**
 * @Severity(level = SeverityLevel::CRITICAL)
 * @Title("Title")
 * @group functional
 * @Features({"Basic Functional Cest"})
 * @Stories({"MQE-305"})
 */
class BasicFunctionalCest
{
	public function _before(AcceptanceTester $I)
	{
		$I->amOnPage("/beforeUrl");
	}

	public function _after(AcceptanceTester $I)
	{
		$I->amOnPage("/afterUrl");
	}

	/**
	 * @Severity(level = SeverityLevel::SEVERE)
	 * @Title("Basic Functional Test")
	 * @Features({"Hardcoded Functional Test"})
	 * @Stories({"MQE-425"})
	 * @Parameter(name = "AcceptanceTester", value="$I")
	 * @group functionalTest
	 * @param AcceptanceTester $I
	 * @return void
	 */
	public function BasicFunctionalTest(AcceptanceTester $I)
	{
		$someVar = $I->grabValueFrom();
		$I->acceptPopup();
		$I->amOnPage("/test/url");
		$I->appendField(".functionalTestSelector", $someVar);
		$I->attachFile(".functionalTestSelector", "testFileAttachment");
		$I->cancelPopup();
		$I->checkOption(".functionalTestSelector");
		$I->click(".functionalTestSelector");
		$I->clickWithLeftButton(".functionalTestSelector");
		$I->clickWithRightButton(".functionalTestSelector");
		$I->closeTab();
		$I->conditionalClick(".functionalTestSelector", ".functionalDependentTestSelector");
		$I->dontSee("someInput", ".functionalTestSelector");
		$I->dontSeeCheckboxIsChecked(".functionalTestSelector");
		$I->dontSeeCookie("someInput");
		$I->dontSeeCurrentUrlEquals("/functionalUrl");
		$I->dontSeeCurrentUrlMatches("/functionalUrl");
		$I->dontSeeElement(".functionalTestSelector");
		$I->dontSeeElementInDOM(".functionalTestSelector");
		$I->dontSeeInCurrentUrl("/functionalUrl");
		$I->dontSeeInField(".functionalTestSelector", $someVar);
		$I->dontSeeInPageSource("someInput");
		$I->dontSeeInSource("<myHtmlHere>");
		$I->dontSeeInTitle("someInput");
		$I->dontSeeLink("someInput", "/functionalUrl");
		$I->dontSeeOptionIsSelected(".functionalTestSelector", "someInput");
		$I->doubleClick(".functionalTestSelector");
		$I->dragAndDrop(".functionalTestSelector", ".functionalTestSelector2");
		$I->executeJS("someJSFunction");
		$I->fillField(".functionalTestSelector", "someInput");
		$grabAttributeVar = $I->grabAttributeFrom(".functionalTestSelector", "someInput");
		$grabCookieVar = $I->grabCookie("grabCookieInput", ["'domain' => 'www.google.com'"]);
		$grabUrlVar = $I->grabFromCurrentUrl("/grabCurrentUrl");
		$grabMultipleVar = $I->grabMultiple(".functionalTestSelector");
		$I->grabTextFrom(".functionalTestSelector");
		$grabValueVar = $I->grabValueFrom(".functionalTestSelector");
		$I->makeScreenshot("screenShotInput");
		$I->maximizeWindow();
		$I->moveBack();
		$I->moveForward();
		$I->moveMouseOver(".functionalTestSelector");
		$I->openNewTab();
		$I->pauseExecution();
		$I->pressKey(".functionalTestSelector");
		$I->reloadPage();
		$I->resetCookie("cookieInput");
		$I->resizeWindow(0, 0);
		$I->scrollTo(".functionalTestSelector");
		$I->see("someInput", ".functionalTestSelector");
		$I->seeCheckboxIsChecked(".functionalTestSelector");
		$I->seeCookie("someInput");
		$I->seeCurrentUrlEquals("/functionalUrl");
		$I->seeCurrentUrlMatches("/functionalUrl");
		$I->seeElement(".functionalTestSelector");
		$I->seeElementInDOM(".functionalTestSelector");
		$I->seeInCurrentUrl("/functionalUrl");
		$I->seeInField(".functionalTestSelector", "someInput");
		$I->seeInPageSource("<myHtmlHere>");
		$I->seeInPopup("someInput");
		$I->seeInSource("<myHtmlHere>");
		$I->seeInTitle("someInput");
		$I->seeLink("someInput", "/functionalUrl");
		$I->seeNumberOfElements(".functionalTestSelector", $someVar);
		$I->seeOptionIsSelected(".functionalTestSelector", "someInput");
		$I->selectOption(".functionalTestSelector");
		$I->setCookie("someInput", "someCookieValue");
		$I->switchToIFrame("someInput");
		$I->switchToNextTab();
		$I->switchToPreviousTab();
		$I->switchToWindow();
		$I->typeInPopup("someInput");
		$I->uncheckOption(".functionalTestSelector");
		$I->unselectOption(".functionalTestSelector", "someInput");
		$I->wait(30);
		$I->waitForElement(".functionalTestSelector", 30);
		$I->waitForElementNotVisible(".functionalTestSelector", 30);
		$I->waitForElementVisible(".functionalTestSelector", 30);
		$I->waitForJS("someJsFunction", 30);
		$I->waitForText("someInput", 30, ".functionalTestSelector");
	}
}
