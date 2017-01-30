<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DifficultyThemes Controller
 *
 * @property \App\Model\Table\DifficultyThemesTable $DifficultyThemes
 */
class DifficultyThemesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $difficultyThemes = $this->paginate($this->DifficultyThemes);

        $this->set(compact('difficultyThemes'));
        $this->set('_serialize', ['difficultyThemes']);
    }

    /**
     * View method
     *
     * @param string|null $id Difficulty Theme id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $difficultyTheme = $this->DifficultyThemes->get($id, [
            'contain' => ['Sheets']
        ]);

        $this->set('difficultyTheme', $difficultyTheme);
        $this->set('_serialize', ['difficultyTheme']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $difficultyTheme = $this->DifficultyThemes->newEntity();
        if ($this->request->is('post')) {
            $difficultyTheme = $this->DifficultyThemes->patchEntity($difficultyTheme, $this->request->data);
            if ($this->DifficultyThemes->save($difficultyTheme)) {
                $this->Flash->success(__('The difficulty theme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The difficulty theme could not be saved. Please, try again.'));
        }
        $sheets = $this->DifficultyThemes->Sheets->find('list', ['limit' => 200]);
        $this->set(compact('difficultyTheme', 'sheets'));
        $this->set('_serialize', ['difficultyTheme']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Difficulty Theme id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $difficultyTheme = $this->DifficultyThemes->get($id, [
            'contain' => ['Sheets']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $difficultyTheme = $this->DifficultyThemes->patchEntity($difficultyTheme, $this->request->data);
            if ($this->DifficultyThemes->save($difficultyTheme)) {
                $this->Flash->success(__('The difficulty theme has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The difficulty theme could not be saved. Please, try again.'));
        }
        $sheets = $this->DifficultyThemes->Sheets->find('list', ['limit' => 200]);
        $this->set(compact('difficultyTheme', 'sheets'));
        $this->set('_serialize', ['difficultyTheme']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Difficulty Theme id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $difficultyTheme = $this->DifficultyThemes->get($id);
        if ($this->DifficultyThemes->delete($difficultyTheme)) {
            $this->Flash->success(__('The difficulty theme has been deleted.'));
        } else {
            $this->Flash->error(__('The difficulty theme could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
