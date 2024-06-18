<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('login', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('login_form_title'), route('login'));
});

Breadcrumbs::for('register', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('register_form_title'), route('register'));
});

Breadcrumbs::for('password.request', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('forgot_password_form_title'), route('password.request'));
});

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Users', route('users.index'));
});

Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Add User', route('users.create'));
});

Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Edit User', route('users.edit'));
});

Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('User Preview', route('users.show'));
});
