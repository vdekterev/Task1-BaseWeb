<?php

/**
 * Form Controller
 */
class Forms extends Controller
{
    /**
     * DataBase Instance
     * @var object
     */
    protected object $formModel;

    public function __construct()
    {
        $this->formModel = $this->model('Form');
    }

    /**
     * Create Form Controller
     * @return void
     */
    public function create(): void
    {
        $data = [
            'user_id' => $_SESSION['user_id'],
            'name' => ucwords(trim($_POST['name'] ?? '')),
            'experience' => $_POST['experience'] ?? '',
            'os' => $_POST['os'] ?? '',
            'learn' => array_sum(
                array(
                    isset($_POST['php']) ? 1 : 0,
                    isset($_POST['mysql']) ? 2 : 0,
                    isset($_POST['js']) ? 4 : 0,
                    isset($_POST['git']) ? 8 : 0
                )
            ),
            'about' => trim($_POST['about'] ?? ''),
            // Errors
            'name_err' => '',
            'learn_err' => '',
            'experience_err' => ''
        ];


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->formValidator($data);
            $errors = array($data['name_err'], $data['learn_err'], $data['experience_err']);
            if (empty(array_filter($errors))) {
                if ($this->formModel->getForm()) {
                    $this->formModel->deleteForm($_SESSION['user_id']);
                }
                if ($this->formModel->createForm($data)) {
                    url_redirect('pages/success');
                }
            }
        }
        $this->view('forms/create', $data);
    }

    /**
     * View Form Controller
     * @return void
     */
    public function view_form(): void
    {
        $sql = $this->formModel->getForm();
        if (!$sql) {
            flashMessage('forms_warning', 'Нет заявок!');
            $this->view('forms/view_form');
            die();
        }
        $data['name'] = $sql->name;
        $data['experience'] = $sql->experience;
        $data['os'] = $sql->os;
        $data['learn'] = $sql->learn;
        $data['about'] = empty($sql->about) ? 'Информация отсутствует' : $sql->about;
        $data['created_at'] = date('d.m.y - H:i', strtotime((string)$sql->created_at));
        $this->view('forms/view_form', $data);
    }

    /**
     * Delete Form Controller
     * @return void
     */
    public function delete(): void
    {
        $this->formModel->deleteForm($_SESSION['user_id']);
        $this->view('forms/delete');
    }

    /**
     * Form Validator
     * @param array $data
     * @return array
     */
    public function formValidator(array $data): array
    {
        if (empty($data['name'])) {
            $data['name_err'] = 'Введите имя';
        } else if (!in_array(strlen($data['name']), range(2, 51))) {
            $data['name_err'] = 'Длина имени от 2 до 50 символов!';
        }
        if ($data['learn'] === 0) {
            $data['learn_err'] = 'Выберите хотя бы одну технологию';
        }
        if (empty($data['experience'])) {
            $data['experience_err'] = 'Укажите Ваш опыт';
        }
        return $data;
    }

}