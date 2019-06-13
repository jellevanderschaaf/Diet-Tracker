<?php

session_start();

$definition = [
    'items' => [
        ['Minced beef', 72, 1.8, 120, 1140, 6.4],
        ['Egg', 6.7, 0.9, 7.7, 95, 0.164],
        ['Butter', 82.5, 0.7, 0.7, 748, 1.196],
        ['Chicken legg', 39, 0, 54, 570, 1.22],
        ['Mackerel', 63, 0, 77, 875, 3.32],
        ['Apple', 0, 12, 0.4, 54, 0.12]      
    ],
    'selection' => []
];

if(!isset($_SESSION['data'])) {

    $_SESSION['data'] = $definition;
  
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(isset($_POST['action'])) {
        switch($_POST['action']) {
            case 'clear':

                $_SESSION['data'] = $definition;

            break;
            case 'select':

                if(isset($_SESSION['data']['selection'][$_POST['item']])) {
                    $_SESSION['data']['selection'][$_POST['item']]++;
                } else $_SESSION['data']['selection'][$_POST['item']] = 1;

            break;
            case 'remove':

                if(!--$_SESSION['data']['selection'][$_POST['item']]) {
                    unset($_SESSION['data']['selection'][$_POST['item']]);
                }

            break;
            case 'create':

                $_SESSION['data']['items'][] = [
                    $_POST['name'],
                    $_POST['fat'],
                    $_POST['carbs'],
                    $_POST['protein'],
                    $_POST['kcals'],
                    $_POST['price']
                ];

            break;
            default: break;
        }
    }

    header('location: /');

}

$data = $_SESSION['data'];

$fields = [
    'fat',
    'carbs',
    'protein',
    'kcals',
    'costs'
];

$totals = array_fill_keys($fields, 0);

foreach($data['selection'] as $item => $count) {

    foreach($fields as $key => $field) {

        $totals[$field] += $data['items'][$item][$key+1] * $count;

    }

}

$graph = array_fill_keys(['fat', 'carbs', 'protein'], 1);

if($total = $totals['fat'] + $totals['carbs'] + $totals['protein']) {

    $graph['fat'] += round($totals['fat']/($total/100));
    $graph['carbs'] += round($totals['carbs']/($total/100));
    $graph['protein'] += round($totals['protein']/($total/100));

}