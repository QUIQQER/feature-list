<?php

$categories = $Site->getChildren([
    'type' => 'quiqqer/features:types/category'
]);

$Engine->assign([
    'categories' => $categories
]);
