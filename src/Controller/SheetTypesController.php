<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SheetTypes Controller
 *
 * @property \App\Model\Table\SheetTypesTable $SheetTypes
 */
class SheetTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $sheetTypes = $this->paginate($this->SheetTypes);

        $this->set(compact('sheetTypes'));
        $this->set('_serialize', ['sheetTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Sheet Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sheetType = $this->SheetTypes->get($id, [
            'contain' => ['Sheets']
        ]);

        $this->set('sheetType', $sheetType);
        $this->set('_serialize', ['sheetType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sheetType = $this->SheetTypes->newEntity();
        if ($this->request->is('post')) {
            $sheetType = $this->SheetTypes->patchEntity($sheetType, $this->request->data);
            if ($this->SheetTypes->save($sheetType)) {
                $this->Flash->success(__('The sheet type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sheet type could not be saved. Please, try again.'));
        }
        $this->set(compact('sheetType'));
        $this->set('_serialize', ['sheetType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sheet Type id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sheetType = $this->SheetTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sheetType = $this->SheetTypes->patchEntity($sheetType, $this->request->data);
            if ($this->SheetTypes->save($sheetType)) {
                $this->Flash->success(__('The sheet type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sheet type could not be saved. Please, try again.'));
        }
        $this->set(compact('sheetType'));
        $this->set('_serialize', ['sheetType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sheet Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sheetType = $this->SheetTypes->get($id);
        if ($this->SheetTypes->delete($sheetType)) {
            $this->Flash->success(__('The sheet type has been deleted.'));
        } else {
            $this->Flash->error(__('The sheet type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
