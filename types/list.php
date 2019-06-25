<?php

$categories = $Site->getChildren(array(
    'type' => 'quiqqer/features:types/category'
));

$Engine->assign(array(
    'categories' => $categories
));
