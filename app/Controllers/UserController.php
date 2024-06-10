<?php

class UserController extends BaseController
{
    private $data;
    private $user;
    function __construct()
    {
        $this->user = new UserModel();
    }
    public function viewLogin()
    {
        $this->renderView("login", $this->data);
    }
    public function viewRegister()
    {
        $this->renderView("register", $this->data);
    }
    public function createUser()
    {
        if (isset($_POST['btn_regiter']) && ($_POST['btn_regiter'] > 0)) {
            $data = [];
            $data['username'] = $_POST['username'];
            $data['password'] = $_POST['pass'];
            $data['name'] = $_POST['fullname'];
            $data['address'] = $_POST['address'];
            $data['email'] = $_POST['email'];
            $data['phone'] = $_POST['phone'];

            if ($data['username'] && $data['password'] && $data['email'] && $data['name']) {
                $allUsers = $this->user->getAllUser();
                $usernameExists = false;

                foreach ($allUsers as $user) {
                    if ($user['username'] == $data['username']) {
                        $usernameExists = true;
                        break;
                    }
                }

                if ($usernameExists) {
                    echo "<script>alert('Username đã tồn tại!')</script>";
                } else {
                    $this->user->createUser($data);
                    header("Location: index.php?page=login");
                    exit();
                }
            } else {
                echo "<script>alert('Vui lòng nhập đầy đủ thông tin!')</script>";
            }
        }
    }

    public function checkUser()
    {
        if (isset($_POST['btn_login']) && ($_POST['btn_login'] > 0)) {
            $data = [];
            $data['username'] = $_POST['username'];
            $data['password'] = $_POST['password'];

            $userinfo = $this->user->checkUser($data);
            if ($userinfo) {
                $_SESSION['user'] = $userinfo;
                if ($_SESSION['user']['role'] == 0) {
                    header("location: index.php?page=home");
                } else if ($_SESSION['user']['role'] == 1) {
                    header("location: admin/index.php");
                }
            }
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        header("location:index.php");
    }

    public function logoutAdmin()
    {
        unset($_SESSION['user']);
        header("location:../index.php");
    }
}
