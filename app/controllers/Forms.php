<?php

/**
 * Form Controller
 */
class Forms extends Controller
{
    protected object $formModel;

    public function __construct()
    {
        $this->formModel = $this->model('Form');
    }

    public function index()
    {
        $data = [
            'name' => ucwords(trim($_POST['name'])) ?? '',
            'experience' => $_POST['experience'] ?? '',
            'os' => $_POST['os'],
            'learn' => array(
                $_POST['php'] ?? '',
                $_POST['mysql'] ?? '',
                $_POST['js'] ?? '',
                $_POST['git'] ?? ''),
            'about' => trim($_POST['about']) ?? '',
            // Errors
            'name_err' => '',
            'learn_err' => '',
            'experience_err' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->formValidator($data);
            $errors = array($data['name_err'], $data['learn_err']);
            print_r($data);
            $this->view('forms/index', $data);
            if (empty(array_filter($errors))) {

//                $this->formModel->createForm($data);
            }
        }
        $this->view('forms/index', $data);
    }

    public function formValidator(array $data): array
    {
        if (empty($data['name'])) {
            $data['name_err'] = 'Введите имя';
        } else if (!in_array(strlen($data['name']), range(2, 51))) {
            $data['name_err'] = 'Длина имени от 2 до 50 символов!';
        }
        if (empty(array_filter($data['learn']))) {
            $data['learn_err'] = 'Выберите хотя бы одну технологию';
        }
        if (empty($data['experience'])) {
            $data['experience_err'] = 'Укажите Ваш опыт';
        }
        foreach (array_keys($data['learn']) as $tech) {
            if ($data['learn'][$tech] !== 'on') {
                unset($data['learn'][$tech]);
            }
        }
        return $data;
    }

}