<?php


define('BASE_URL_PATH', '/');
require_once __DIR__ . '/src/functions.php';
require_once __DIR__ . '/libraries/Psr4AutoloaderClass.php';

$loader = new Psr4AutoloaderClass;
$loader->register();

// Các lớp có không gian tên bắt đầu với CT275\Labs nằm ở src
$loader->addNamespace('CNWeb\PROJECT', __DIR__ .'/src');


try {
$PDO = (new CNWeb\PROJECT\PDOFactory)->create([
'dbhost' => 'localhost',
'dbname' => 'baocaoct275',
'dbuser' => 'root',
'dbpass' => '123456'
]);
} catch (Exception $ex) {
echo 'Không thể kết nối đến MySQL,
    kiểm tra lại username/password đến MySQL.<br>';
    exit("<pre>${ex}</pre>");
}

?>