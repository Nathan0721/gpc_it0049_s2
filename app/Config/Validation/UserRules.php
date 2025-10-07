<?php
namespace App\Validation;
use App\Models\UserModel;

class UserRules {
    // Validate user login
    public function validateUser(string $str, string $fields, array $data): bool
    {
        $model = new UserModel();
        $user = $model->where('username', $data['username'])
                      ->first();

        if (!$user) {
            return false;
        }

        return password_verify($data['password'], $user['password']);
    }

    // Check if current password matches the stored password
    public function checkCurrentPassword(string $str, string $fields, array $data): bool
    {
        $userId = session()->get('id');
        $model = new UserModel();
        $user = $model->find($userId);

        if (!$user) {
            return false;
        }

        return password_verify($data['current_password'], $user['password']);
    }
}