<?php
namespace MVC\Controllers;

use MVC\Models\User;
use MVC\View;
use MVC\ViewModels\LoginInformation;
use MVC\ViewModels\RegisterInformation;

class UsersController extends Controller
{
    public function login()
    {
        $viewModel = new LoginInformation();

        if (isset($_POST['username'], $_POST['password'])) {
            try {
                $user = $_POST['username'];
                $pass = $_POST['password'];

                $this->initLogin($user, $pass);

            } catch (\Exception $e) {
                $viewModel->error = $e->getMessage();

                return new View($viewModel);
            }
        }

        return new View($viewModel);
    }

    private function initLogin($user, $pass)
    {
        $userModel = new User();
        $userId = $userModel->login($user, $pass);
        $_SESSION['id'] = $userId;

        header("Location: profile");
    }

    public function register()
    {
        $viewModel = new RegisterInformation();

        if (isset($_POST['username'], $_POST['password'])) {
            try {
                $user = $_POST['username'];
                $pass = $_POST['password'];

                $userModel = new User();
                $userModel->register($user, $pass);

                $this->initLogin($user, $pass);
            } catch (\Exception $e) {
                $viewModel->error = $e->getMessage();
                return new View($viewModel);
            }
        }

        return new View();
    }

    public function profile()
    {
        if (!$this->isLogged()) {
            header("Location: login");
        }

        $userModel = new User();
        $userInfo = $userModel->getInfo($_SESSION['id']);


        $userViewModel = new \MVC\ViewModels\User(
            $userInfo['username'],
            $userInfo['password'],
            $userInfo['id'],
            $userInfo['money']

        );

        $this->escapeAll($userViewModel);

        return new View($userViewModel);
    }

    public function edit(){
        $userModel = new User();
        $userInfo = $userModel->getInfo($_SESSION['id']);


        $userViewModel = new \MVC\ViewModels\User(
            $userInfo['username'],
            $userInfo['password'],
            $userInfo['id'],
            $userInfo['money']

        );

        if (isset($_POST['edit'])) {
            if ($_POST['password'] != $_POST['confirm'] || empty($_POST['password'])) {
                $userViewModel->error = 1;
                return new View($userViewModel);
            }

            if ($userModel->edit(
                $_POST['username'],
                $_POST['password'],
                $_SESSION['id']
            )) {
                $userViewModel->success = 1;
                $userViewModel->setUsername($_POST['username']);
                $userViewModel->setPass($_POST['password']);

                return new View($userViewModel);
            }

            $userViewModel->error = 1;
            return new View($userViewModel);
        }
        return new View($userViewModel);
    }

    public function addMoney(){
        $userModel = new User();
        $userInfo = $userModel->getInfo($_SESSION['id']);


        $userViewModel = new \MVC\ViewModels\User(
            $userInfo['username'],
            $userInfo['password'],
            $userInfo['id'],
            $userInfo['money']

        );

        if (isset($_POST['add'])) {
            if ($_POST['sum'] != $_POST['confirm-sum'] || empty($_POST['sum'])) {
                $userViewModel->error = 1;
                return new View($userViewModel);
            }
            if ($userModel->editSum(
                (double)$_POST['sum'],
                (double)$userInfo['money'],
                $_SESSION['id']
            )) {
                $userViewModel->success = 1;
                $userViewModel->setMoney($_POST['sum']);

                return new View($userViewModel);
            }

            $userViewModel->error = 1;
            return new View($userViewModel);
        }
        return new View($userViewModel);
    }


}