<?php
//用于写入数据

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

// 检查是否为独立访客（基于Cookie）
$isUniqueVisitor = false;
if (!isset($_COOKIE['visited'])) {
    // 设置永久Cookie（有效期100年）
    $expire = time() + (86400 * 365 * 100);
    setcookie('visited', '1', $expire, '/', '', false, true);
    
    // 仅在首次访问时增加独立访客数
    $counter['unique']++;
    $isUniqueVisitor = true;
}

// 每次访问都增加总浏览次数
$counter['total']++;

// 准备保存的数据
$dataToSave = [
    'total' => $counter['total'],
    'unique' => $counter['unique']
];

// 保存到JSON文件
try {
    if (file_put_contents($jsonFile, json_encode($dataToSave, JSON_PRETTY_PRINT)) === false) {
        throw new Exception('无法写入文件');
    }
} catch (Exception $e) {
    error_log('保存失败: ' . $e->getMessage());
}
?>    
