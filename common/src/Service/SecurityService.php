<?php

class SecurityService
{
    public function checkPassword($user, $password)
    {

        if (empty($user)) {
            throw new Exception('User Not Found', 404);
        }

        if (UserService::encodePassword($password) !== $user['password']) {
            // TODO Security
            throw new Exception('Incorrect Password', 400);

        }

            return true;
    }

    public static function redirectToStartPage()
    {
        header("location: http://localhost/shop/frontend/index.php");
        die();
    }

    public static function redirectToLoginPage()
    {
        header("location: http://localhost/shop/frontend/index.php?model=site&action=login");
        die();
    }
}