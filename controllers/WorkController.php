<?php

require_once 'models/Database.php';
require_once 'models/Work.php';

class WorkController
{
    private $model;

    public function __construct()
    {
        $database = new Database();
        $connection = $database->getConnection();
        $this->model = new Work($connection);
    }

    public function index(): void
    {
        $tasks = $this->model->getAllWorks();
        require 'views/work/index.php';
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'status' => $_POST['status']
            ];
            try {
                $this->model->createWork($data);
            } catch (Exception $exception) {
                echo 'Error create: ' . $exception->getMessage();
            }
        }
        header('Location: index.php');
        exit;
    }

    public function detail(): void
    {
        $id = $_GET['id'];
        $task = $this->model->getWorkById($id);
        require 'views/work/edit.php';
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'start_date' => $_POST['start_date'],
                'end_date' => $_POST['end_date'],
                'status' => $_POST['status']
            ];
            try {
                echo $_POST['id'];

                $this->model->updateWork($_POST['id'], $data);
            } catch (Exception $exception) {
                echo 'Error update: ' . $exception->getMessage();
            }

        }
        header('Location: index.php');
        exit;
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->deleteWork($_POST['id']);
        }
        header('Location: index.php');
        exit;
    }

    public function calendar(): void
    {
        $tasks = $this->model->getAllWorks();
        $data = [];
        foreach ($tasks as $task) {
            $item = [
                'title' => $task['name'],
                'start' => $task['start_date'],
                'end' => $task['end_date'],
                'url' => 'index.php?controller=work&action=detail&id=' . $task['id']
            ];
            $data[] = $item;
        }
        $data = json_encode($data);
        require 'views/work/calendar.php';
    }
}