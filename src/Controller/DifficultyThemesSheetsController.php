<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DifficultyThemesSheets Controller
 *
 * @property \App\Model\Table\DifficultyThemesSheetsTable $DifficultyThemesSheets
 */
class DifficultyThemesSheetsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sheets', 'Sheets.Tunes', 'Sheets.SheetTypes', 'DifficultyThemes', 'DifficultyTypes', 'DifficultyRanks']
        ];
        $difficultyThemesSheets = $this->paginate($this->DifficultyThemesSheets);

        $this->set(compact('difficultyThemesSheets'));
        $this->set('_serialize', ['difficultyThemesSheets']);
    }

    /**
     * View method
     *
     * @param string|null $id Difficulty Themes Sheet id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $difficultyThemesSheet = $this->DifficultyThemesSheets->get($id, [
            'contain' => ['Sheets', 'Sheets.Tunes', 'Sheets.SheetTypes', 'DifficultyThemes', 'DifficultyTypes', 'DifficultyRanks']
        ]);

        $this->set('difficultyThemesSheet', $difficultyThemesSheet);
        $this->set('_serialize', ['difficultyThemesSheet']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $difficultyThemesSheet = $this->DifficultyThemesSheets->newEntity();
        if ($this->request->is('post')) {
            $difficultyThemesSheet = $this->DifficultyThemesSheets->patchEntity($difficultyThemesSheet, $this->request->data);
            if ($this->DifficultyThemesSheets->save($difficultyThemesSheet)) {
                $this->Flash->success(__('The difficulty themes sheet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The difficulty themes sheet could not be saved. Please, try again.'));
        }
        $sheets = $this->DifficultyThemesSheets->Sheets->find('list', ['limit' => 200, 'contain' => ['Tunes', 'SheetTypes']]);
        $difficultyThemes = $this->DifficultyThemesSheets->DifficultyThemes->find('list', ['limit' => 200]);
        $difficultyTypes = $this->DifficultyThemesSheets->DifficultyTypes->find('list', ['limit' => 200]);
        $difficultyRanks = $this->DifficultyThemesSheets->DifficultyRanks->find('list', ['limit' => 200]);
        $this->set(compact('difficultyThemesSheet', 'sheets', 'difficultyThemes', 'difficultyTypes', 'difficultyRanks'));
        $this->set('_serialize', ['difficultyThemesSheet']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Difficulty Themes Sheet id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $difficultyThemesSheet = $this->DifficultyThemesSheets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $difficultyThemesSheet = $this->DifficultyThemesSheets->patchEntity($difficultyThemesSheet, $this->request->data);
            if ($this->DifficultyThemesSheets->save($difficultyThemesSheet)) {
                $this->Flash->success(__('The difficulty themes sheet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The difficulty themes sheet could not be saved. Please, try again.'));
        }
        $sheets = $this->DifficultyThemesSheets->Sheets->find('list', ['limit' => 200, 'contain' => ['Tunes', 'SheetTypes']]);
        $difficultyThemes = $this->DifficultyThemesSheets->DifficultyThemes->find('list', ['limit' => 200]);
        $difficultyTypes = $this->DifficultyThemesSheets->DifficultyTypes->find('list', ['limit' => 200]);
        $difficultyRanks = $this->DifficultyThemesSheets->DifficultyRanks->find('list', ['limit' => 200]);
        $this->set(compact('difficultyThemesSheet', 'sheets', 'difficultyThemes', 'difficultyTypes', 'difficultyRanks'));
        $this->set('_serialize', ['difficultyThemesSheet']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Difficulty Themes Sheet id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $difficultyThemesSheet = $this->DifficultyThemesSheets->get($id);
        if ($this->DifficultyThemesSheets->delete($difficultyThemesSheet)) {
            $this->Flash->success(__('The difficulty themes sheet has been deleted.'));
        } else {
            $this->Flash->error(__('The difficulty themes sheet could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
