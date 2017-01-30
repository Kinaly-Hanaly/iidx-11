<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DifficultyTypes Controller
 *
 * @property \App\Model\Table\DifficultyTypesTable $DifficultyTypes
 */
class DifficultyTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $difficultyTypes = $this->paginate($this->DifficultyTypes);

        $this->set(compact('difficultyTypes'));
        $this->set('_serialize', ['difficultyTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Difficulty Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $difficultyType = $this->DifficultyTypes->get($id, [
            'contain' => ['DifficultyThemesSheets']
        ]);

        $this->set('difficultyType', $difficultyType);
        $this->set('_serialize', ['difficultyType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $difficultyType = $this->DifficultyTypes->newEntity();
        if ($this->request->is('post')) {
            $difficultyType = $this->DifficultyTypes->patchEntity($difficultyType, $this->request->data);
            if ($this->DifficultyTypes->save($difficultyType)) {
                $this->Flash->success(__('The difficulty type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The difficulty type could not be saved. Please, try again.'));
        }
        $this->set(compact('difficultyType'));
        $this->set('_serialize', ['difficultyType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Difficulty Type id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $difficultyType = $this->DifficultyTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $difficultyType = $this->DifficultyTypes->patchEntity($difficultyType, $this->request->data);
            if ($this->DifficultyTypes->save($difficultyType)) {
                $this->Flash->success(__('The difficulty type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The difficulty type could not be saved. Please, try again.'));
        }
        $this->set(compact('difficultyType'));
        $this->set('_serialize', ['difficultyType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Difficulty Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $difficultyType = $this->DifficultyTypes->get($id);
        if ($this->DifficultyTypes->delete($difficultyType)) {
            $this->Flash->success(__('The difficulty type has been deleted.'));
        } else {
            $this->Flash->error(__('The difficulty type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
