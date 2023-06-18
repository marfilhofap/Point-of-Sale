<?php
$content = isset($_GET['c']) ? $_GET['c'] : "index";
// include('content/home.php');

echo '<div class="app-main__inner">';

switch ($content) {
    case 'index':
        include __DIR__ . '/../content/home.php';
        break;
    case 'meza_sira':
        include __DIR__ . '/../content/order/meza_sira.php';
        break;
    case 'order':
        include __DIR__ . '/../content/order/order.php';
        break;
    case 'pendente':
        include __DIR__ . '/../content/order/pendentes.php';
        break;
    case 'produtu':
        include __DIR__ . '/../content/produtu/produtu.php';
        break;
    case 'produtu_sira':
        include __DIR__ . '/../content/produtu/produtu_sira.php';
        break;
    case 'transasaun_sira':
        include __DIR__ . '/../content/transasaun/transasaun_sira.php';
        break;
    case 'meza_mamuk':
        include __DIR__ . '/../content/transasaun/meza_mamuk.php';
        break;
    case 'membru':
        include __DIR__ . '/../content/j_utilijador/membru.php';
        break;
    case 'pozisaun':
        include __DIR__ . '/../content/j_utilijador/pozisaun.php';
        break;
    case 'profile':
        include __DIR__ . '/../content/j_utilijador/profile.php';
        break;
    case 'resibu':
        include __DIR__ . '/../content/relatorio/resibu.php';
        break;
    case 'detallu':
        include __DIR__ . '/../content/relatorio/detallu.php';
        break;
    case 'relatorio_jeral':
        include __DIR__ . '/../content/relatorio/relatorio_jeral.php';
        break;
    default:
        include __DIR__ . '/../content/home.php';
        break;
}

echo '</div>';
