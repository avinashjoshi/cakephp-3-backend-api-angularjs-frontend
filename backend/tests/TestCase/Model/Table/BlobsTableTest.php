<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BlobsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BlobsTable Test Case
 */
class BlobsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BlobsTable
     */
    public $Blobs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.blobs'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Blobs') ? [] : ['className' => 'App\Model\Table\BlobsTable'];
        $this->Blobs = TableRegistry::get('Blobs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Blobs);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
