<?php
namespace TYPO3\Flow\Tests\Functional\Http\Client;

/*
 * This file is part of the TYPO3.Flow package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

/**
 * Functional tests for the HTTP client internal request engine
 *
 * @requires extension curl
 */
class CurlEngineTest extends \TYPO3\Flow\Tests\FunctionalTestCase
{
    /**
     * @var boolean
     */
    protected $testableSecurityEnabled = true;

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $curlEngine = $this->objectManager->get(\TYPO3\Flow\Http\Client\CurlEngine::class);
        $this->browser->setRequestEngine($curlEngine);
    }

    /**
     * Check if the Curl Engine can send a GET request to typo3.org
     *
     * @test
     */
    public function getRequestReturnsResponse()
    {
        $response = $this->browser->request('http://typo3.org');
        $this->assertContains('This website is powered by TYPO3', $response->getContent());
    }
}
