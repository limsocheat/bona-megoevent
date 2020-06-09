<?php

Breadcrumbs::for('index', function ($trail) {
    $trail->add('Home', route('index'));
});

Breadcrumbs::for('upcoming', function ($trail) {
    $trail->parent('index');
    $trail->add('upcoming', route('upcoming'));
});