<?php

include(dirname(__FILE__).'/../bootstrap/unit.php');
//include(dirname(__FILE__).'/../bootstrap/database.php');

require_once dirname(__FILE__).'/../../../../config/ProjectConfiguration.class.php';
$configuration = ProjectConfiguration::getApplicationConfiguration('pc_frontend', 'test', true);
sfContext::createInstance($configuration);

$table = Doctrine::getTable('CheckIn');
$openCheckIn = $table->find(1);
$snsCheckIn = $table->find(2);
$friendCheckIn = $table->find(3);
$privateCheckIn = $table->find(4);
$m4CheckIn = $table->find(5);

$mTable = Doctrine::getTable('Member');
$owner = $mTable->find(1);
$friend = $mTable->find(2);
$other = $mTable->find(3);
$blocked = $mTable->find(4);

$t = new lime_test(21, new lime_output_color());

$t->diag('1.CheckIn::isVisible()');
$t->diag('1-1. always visible for content owner');
$t->ok($openCheckIn->isVisible($owner->getId()), 'my checkin(open)');
$t->ok($snsCheckIn->isVisible($owner->getId()), 'my checkin(sns)');
$t->ok($friendCheckIn->isVisible($owner->getId()), 'my checkin(friend)');
$t->ok($privateCheckIn->isVisible($owner->getId()), 'my checkin(private)');
$t->diag('1-2. almost visible for friend, but private one.');
$t->ok($openCheckIn->isVisible($friend->getId()), 'checkin(open) of a friend');
$t->ok($snsCheckIn->isVisible($friend->getId()), 'checkin(sns) of a friend');
$t->ok($friendCheckIn->isVisible($friend->getId()), 'checkin(friend) of a friend');
$t->ok(!$privateCheckIn->isVisible($friend->getId()), 'checkin(private) of a friend');
$t->diag('1-3. only "open" & "snsMember" contents are visible for sns member');
$t->ok($openCheckIn->isVisible($other->getId()), 'checkin(open) of a member');
$t->ok($snsCheckIn->isVisible($other->getId()), 'checkin(sns) of a member');
$t->ok(!$friendCheckIn->isVisible($other->getId()), 'checkin(friend) of a member');
$t->ok(!$privateCheckIn->isVisible($other->getId()), 'checkin(private) of a member');
$t->diag('1-4. only "open" content for alian');
$alian = null;
$t->ok($openCheckIn->isVisible($alian), 'checkin(open)');
$t->ok(!$snsCheckIn->isVisible($alian), 'checkin(sns)');
$t->ok(!$friendCheckIn->isVisible($alian), 'checkin(friend)');
$t->ok(!$privateCheckIn->isVisible($alian), 'checkin(private)');

$t->diag('1-5. no content for blocked');
$t->ok(!$openCheckIn->isVisible($blocked->getId()), 'checkin(open) of the member who is blocking you');
$t->ok(!$snsCheckIn->isVisible($blocked->getId()), 'checkin(sns) of the member who is blocking you');
$t->ok(!$friendCheckIn->isVisible($blocked->getId()), 'checkin(friend) of the member who is blocking you');
$t->ok(!$privateCheckIn->isVisible($blocked->getId()), 'checkin(private) of the member who is blocking you');

$t->diag('1-6. you can see even if you blocked content owner.');
$t->ok($m4CheckIn->isVisible($owner->getId()), 'checkin(sns) of another member whom you are blocking');