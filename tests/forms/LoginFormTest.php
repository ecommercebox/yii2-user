<?php

namespace yii2mod\user\tests\forms;

use Yii;
use yii2mod\user\models\LoginForm;
use yii2mod\user\tests\TestCase;

/**
 * Class LoginFormTest
 * @package yii2mod\user\tests
 */
class LoginFormTest extends TestCase
{
    public function testLoginNoUser()
    {
        $model = new LoginForm([
            'email' => 'not_existing_username',
            'password' => 'not_existing_password',
        ]);
        $this->assertFalse($model->login());
    }

    public function testLoginWrongPassword()
    {
        $model = new LoginForm([
            'email' => 'demo',
            'password' => 'wrong_password',
        ]);
        $this->assertFalse($model->login());
        $this->assertArrayHasKey('password', $model->errors);
    }

    public function testLoginCorrect()
    {
        $model = new LoginForm([
            'email' => 'demo@mail.com',
            'password' => 'password',
        ]);
        $this->assertTrue($model->login());
    }
}