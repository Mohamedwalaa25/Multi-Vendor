<?php


return [
    [
        'icon' => "nav-icon fas fa-tachometer-alt",
        "route" => "dashboard",
        'title' => 'Dashboard',
        'active' => "dashboard",
    ],
    [
        'icon' => "far fa-circle nav-icon",
        "route" => "categories.index",
        'title' => 'Categories',
        'active' => 'categories.*',
    ],
    [
        'icon' => "far fa-circle nav-icon",
        "route" => "products.index",
        'title' => 'Products',
        'active' => 'products.*',
    ],
];
