<?php

// app/Controllers/AuthController.php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\LoginModel;

class Controllerlogin extends BaseController
{
    public function index()
    {
        // Destroy the user session and redirect to the login page
        session()->destroy();
        return view('admin/login');
    }

    public function login()
    {
        // Handle login form submission
        $model = new LoginModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Perform user authentication, e.g., check username and password against the database
        $admin = $model->where('username', $username)->first();
        if (!$admin || !password_verify($password, $admin['password'])) {
            return redirect()->to('/admin')->with('error', 'Invalid username or password');
        }
        session()->set('id', $admin['id']);
        return redirect()->to('/admin/dashboard');
    }

    public function changepass()
    {
        return view('admin/change-password');
    }

    public function updatePassword()
    {
        $model = new LoginModel();
        $admin = $model->find(session('id'));

        if (!$admin) {
            return redirect()->to('/admin')->with('error', 'User not found');
        }

        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        if (!password_verify($currentPassword, $admin['password'])) {
            return redirect()->to('/admin/change-password')->with('error', 'Current password is incorrect');
        }

        if ($newPassword !== $confirmPassword) {
            return redirect()->to('/admin/change-password')->with('error', 'New password and confirm password do not match');
        }

        $newPasswordHash = password_hash($newPassword, PASSWORD_BCRYPT);
        $data = [
            'password' => $newPasswordHash,
        ];

        $model->update($admin['id'], $data);

        return redirect()->to('/admin')->with('success', 'Password updated successfully');
    }

    public function Logout() {
        session()->destroy();
        return view('admin/login');
    }

    public function Dashboard() {
        return view('admin/dashboard');
    }

}
