<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Utility\Text;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController {
    
     public function initialize() {
        parent::initialize();
        $this->Auth->allow(['logout', 'add']);
        $this->Auth->deny(['view', 'index']);
        $this->Auth->allow('reSendConfirmEmail');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Roles'],
        ];
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        if (in_array($action, ['index'])) {
            if (!$user['active']) {
                $this->Flash->success(__('Please confirme your email'));
                return parent::isAuthorized($user);
            }
            return true;
        }

         if (in_array($action, ['nonConfirmer', 'sendConfirmEmail'])) {
          return true;
          } 

        $id = $this->request->getParam('pass.0');
        if (!$id) {
            $this->Flash->error(_('missing parameter'));
            return false;
        }

        if ($id == $user['id']) {
            return true;
        } else {
            return parent::isAuthorized($user);
        }
    }



    // In src/Controller/UsersController.php
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            //debug($user);
            // die();

            if ($user) {
                $this->Auth->setUser($user);
                if (!$user['confirmed']) {
                    $this->Flash->error(_('Please confirm your email to access users\' list'));
                }
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout() {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function nonConfirmer($id) {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->Flash->error(__('Your account is not confirmed.'));

        $this->set('user', $user);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $user = $this->Users->get($id, [
            'contain' => ['Roles', 'Purchases'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->uuid = Text::uuid();
            $user->confirmed = false;
            $user->role_id = 3;
            //debug($user);
            //die();
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $this->sendConfirmEmail($user->uuid);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function reSendConfirmEmail($uuid){
        $this->sendConfirmEmail($uuid);
        return $this->redirect(['action' => 'index']);
    }

    public function sendConfirmEmail($uuid) {
        $user = $this->Users->findByUuid($uuid)->firstOrFail();
        $email = new Email('default');
        $email->to($user->email)->subject(__('Confirm your email'))->send('http://' . $_SERVER['HTTP_HOST'] . $this->request->webroot . 'users/confirm/' . $user->uuid);
    }

    public function confirm($uuid) {
        $user = $this->Users->findByUuid($uuid)->firstOrFail();
        $user->confirmed = true;
        if ($this->Users->save($user)) {
            $this->Flash->success(__('Thank you') . '. ' . __('Your email has been confirmed'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The confirmation could not be saved. Please, try again'));
    }

}
