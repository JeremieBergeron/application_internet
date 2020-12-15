<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

/**
 * KrajRegions Controller
 *
 * @property \App\Model\Table\KrajRegionsTable $KrajRegions
 *
 * @method \App\Model\Entity\KrajRegion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TagsController extends AppController {

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        
    $this->Auth->allow('index');

    }

    public function index()
    {
        $tags = $this->Tags->find('all');
        $this->set([
            'tags' => $tags,
            '_serialize' => ['tags']
        ]);
    }

    public function view($id)
    {
        $tag = $this->Tags->get($id);
        $this->set([
            'tag' => $tag,
            '_serialize' => ['tag']
        ]);
    }

    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $tag = $this->Tags->newEntity($this->request->getData());
        if ($this->Tags->save($tag)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'tag' => $tag,
            '_serialize' => ['message', 'tag']
        ]);
    }

    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $tag = $this->Tags->get($id);
        $tag = $this->Tags->patchEntity($tag, $this->request->getData());
        if ($this->Tags->save($tag)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['delete']);
        $tag = $this->Tags->get($id);
        $message = 'Deleted';
        if (!$this->Tags->delete($tag)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }


}
