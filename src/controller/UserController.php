<?php

namespace Nhmnazmul\UsersManagment\controller;

use Nhmnazmul\UsersManagment\models\User;

class UserController
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getAllUser(): void
    {
        $data = $this->user->getAllUser();

        if (empty($data)) {
            sendResponse(500, [
                "success" => false,
                "message" => "Internal server error",
                "data" => $data
            ]);
        }

        sendResponse(200, [
            "success" => true,
            "message" => "User Retrieved successful",
            "data" => $data
        ]);
    }

}