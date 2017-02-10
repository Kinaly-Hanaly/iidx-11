<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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

    public function viewWithUserScore()
    {

        $user_id = $this->request->params['pass'][0];
        $theme_id = $this->request->params['pass'][1];

        $difficultyTheme = $this->DifficultyThemes->find('WithUserScore', [
            'user_id' => $user_id,
            'difficultyTheme_id' => $theme_id
        ]);

        $usersTable = TableRegistry::get('Users');
        $user = $usersTable->get($user_id);

        // 難易度ごとにグループ分けする
        $difficulties_sheets = array();
        $tmp_theme_sheet = array();
        foreach ($difficultyTheme->difficulty_themes_sheets as $theme_sheet) {
            if(empty($tmp_theme_sheet)
                || ($tmp_theme_sheet->difficulty_type != $theme_sheet->difficulty_type)
                || ($tmp_theme_sheet->difficulty_rank != $theme_sheet->difficulty_rank)
            ) {
                if($theme_sheet->difficulty_type != null){
                    $difficulty = $theme_sheet->difficulty_type->type_name . $theme_sheet->difficulty_rank->rank_name;
                } else {
                    $difficulty = '難易度未定';
                }
                $difficulties_sheets[$difficulty] = array($theme_sheet->sheet);
            } else {
                array_push($difficulties_sheets[$difficulty], $theme_sheet->sheet);
            }
            $tmp_theme_sheet = $theme_sheet;
        }
        $difficultyTheme->difficulty_themes_sheets = $difficulties_sheets;

        $this->set('difficultyTheme', $difficultyTheme);
        $this->set('user', $user);
        $this->set('_serialize', ['difficultyTheme']);
    }
}
