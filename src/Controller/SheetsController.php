<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Sheets Controller
 *
 * @property \App\Model\Table\SheetsTable $Sheets
 */
class SheetsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tunes', 'SheetTypes']
        ];
        $sheets = $this->paginate($this->Sheets);

        $this->set(compact('sheets'));
        $this->set('_serialize', ['sheets']);
    }

    /**
     * View method
     *
     * @param string|null $id Sheet id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sheet = $this->Sheets->get($id, [
            'contain' => ['Tunes', 'SheetTypes', 'DifficultyThemes', 'Scores']
        ]);

        $this->set('sheet', $sheet);
        $this->set('_serialize', ['sheet']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sheet = $this->Sheets->newEntity();
        if ($this->request->is('post')) {
            $sheet = $this->Sheets->patchEntity($sheet, $this->request->data);
            if ($this->Sheets->save($sheet)) {
                $this->Flash->success(__('The sheet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sheet could not be saved. Please, try again.'));
        }
        $tunes = $this->Sheets->Tunes->find('list', ['limit' => 200]);
        $sheetTypes = $this->Sheets->SheetTypes->find('list', ['limit' => 200]);
        $difficultyThemes = $this->Sheets->DifficultyThemes->find('list', ['limit' => 200]);
        $this->set(compact('sheet', 'tunes', 'sheetTypes', 'difficultyThemes'));
        $this->set('_serialize', ['sheet']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sheet id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sheet = $this->Sheets->get($id, [
            'contain' => ['DifficultyThemes']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sheet = $this->Sheets->patchEntity($sheet, $this->request->data);
            if ($this->Sheets->save($sheet)) {
                $this->Flash->success(__('The sheet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sheet could not be saved. Please, try again.'));
        }
        $tunes = $this->Sheets->Tunes->find('list', ['limit' => 200]);
        $sheetTypes = $this->Sheets->SheetTypes->find('list', ['limit' => 200]);
        $difficultyThemes = $this->Sheets->DifficultyThemes->find('list', ['limit' => 200]);
        $this->set(compact('sheet', 'tunes', 'sheetTypes', 'difficultyThemes'));
        $this->set('_serialize', ['sheet']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sheet id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sheet = $this->Sheets->get($id);
        if ($this->Sheets->delete($sheet)) {
            $this->Flash->success(__('The sheet has been deleted.'));
        } else {
            $this->Flash->error(__('The sheet could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
