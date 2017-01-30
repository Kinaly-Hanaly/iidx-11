<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DifficultyRanks Controller
 *
 * @property \App\Model\Table\DifficultyRanksTable $DifficultyRanks
 */
class DifficultyRanksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $difficultyRanks = $this->paginate($this->DifficultyRanks);

        $this->set(compact('difficultyRanks'));
        $this->set('_serialize', ['difficultyRanks']);
    }

    /**
     * View method
     *
     * @param string|null $id Difficulty Rank id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $difficultyRank = $this->DifficultyRanks->get($id, [
            'contain' => ['DifficultyThemesSheets']
        ]);

        $this->set('difficultyRank', $difficultyRank);
        $this->set('_serialize', ['difficultyRank']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $difficultyRank = $this->DifficultyRanks->newEntity();
        if ($this->request->is('post')) {
            $difficultyRank = $this->DifficultyRanks->patchEntity($difficultyRank, $this->request->data);
            if ($this->DifficultyRanks->save($difficultyRank)) {
                $this->Flash->success(__('The difficulty rank has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The difficulty rank could not be saved. Please, try again.'));
        }
        $this->set(compact('difficultyRank'));
        $this->set('_serialize', ['difficultyRank']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Difficulty Rank id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $difficultyRank = $this->DifficultyRanks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $difficultyRank = $this->DifficultyRanks->patchEntity($difficultyRank, $this->request->data);
            if ($this->DifficultyRanks->save($difficultyRank)) {
                $this->Flash->success(__('The difficulty rank has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The difficulty rank could not be saved. Please, try again.'));
        }
        $this->set(compact('difficultyRank'));
        $this->set('_serialize', ['difficultyRank']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Difficulty Rank id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $difficultyRank = $this->DifficultyRanks->get($id);
        if ($this->DifficultyRanks->delete($difficultyRank)) {
            $this->Flash->success(__('The difficulty rank has been deleted.'));
        } else {
            $this->Flash->error(__('The difficulty rank could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
