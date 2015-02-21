<?php 
$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('log in to the dashboard');

$I->amOnRoute('login_path');
$I->signIn();

$I->seeCurrentRouteIs('dashboard_path');
