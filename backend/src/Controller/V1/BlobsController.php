<?php
namespace App\Controller\V1;

use App\Controller\AppController;
use Cake\Network\Exception\BadRequestException;

/**
 * Blobs Controller
 *
 * @property \App\Model\Table\BlobsTable $Blobs
 */
class BlobsController extends AppController
{
  public function implementedEvents()
    {
        return parent::implementedEvents() + ['Crud.beforePaginate' => '_beforePaginate'];
    }

    public function _beforePaginate(\Cake\Event\Event $event)
    {
      $event->subject()->query->order(['created' => 'DESC']);
    }

    public function errorResponse()
    {
        throw new BadRequestException('Testing some bad request @ /v1/errorPage');
    }
}
