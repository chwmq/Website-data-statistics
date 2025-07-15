<?php
// JSON文件路径
$jsonFile = 'counter.json';

// 初始化计数器
$counter = ['total' => 0, 'unique' => 0];

// 检查JSON文件是否存在
if (file_exists($jsonFile)) {
    // 读取现有计数
    $jsonData = file_get_contents($jsonFile);
    $counter = json_decode($jsonData, true) ?: $counter;
}
?>    