<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lamps Controller
 *
 * @property \App\Model\Table\LampsTable $Lamps
 */
class LampsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $lamps = $this->paginate($this->Lamps);

        $this->set(compact('lamps'));
        $this->set('_serialize', ['lamps']);
    }

    /**
     * View method
     *
     * @param string|null $id Lamp id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lamp = $this->Lamps->get($id, [
            'contain' => ['Scores']
        ]);

        $this->set('lamp', $lamp);
        $this->set('_serialize', ['lamp']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lamp = $this->Lamps->newEntity();
        if ($this->request->is('post')) {
            $lamp = $this->Lamps->patchEntity($lamp, $this->request->data);
            if ($this->Lamps->save($lamp)) {
                $this->Flash->success(__('The lamp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lamp could not be saved. Please, try again.'));
        }
        $this->set(compact('lamp'));
        $this->set('_serialize', ['lamp']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lamp id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lamp = $this->Lamps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lamp = $this->Lamps->patchEntity($lamp, $this->request->data);
            if ($this->Lamps->save($lamp)) {
                $this->Flash->success(__('The lamp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lamp could not be saved. Please, try again.'));
        }
        $this->set(compact('lamp'));
        $this->set('_serialize', ['lamp']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Lamp id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lamp = $this->Lamps->get($id);
        if ($this->Lamps->delete($lamp)) {
            $this->Flash->success(__('The lamp has been deleted.'));
        } else {
            $this->Flash->error(__('The lamp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
