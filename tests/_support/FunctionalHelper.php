<?php namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{
    public function signIn()
    {
        // User account details.
        $email    = 'email@domain.com';
        $password = 'password';

        // Create the account
        $this->haveAnAccount(compact('email', 'password'));

        $I = $this->getModule('Laravel4');

        $I->amOnRoute('login_path');
        $I->fillField('email', $email);
        $I->fillField('password', $password);
        $I->click('Log In');
    }

    public function have($model, $overrides = [])
    {
        return TestDummy::create($model, $overrides);
    }

    public function haveAnAccount($overrides = [])
    {
        return $this->have('Knot\Users\User', $overrides);
    }
}
