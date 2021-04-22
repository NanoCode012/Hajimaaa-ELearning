<?php

require_once dirname(__FILE__) . '/conf.php';

if ($version && $version != '1.1') die('Please check conf file (config/conf.php). Your version is missing or too low. Update it following (config/conf.php.sample) ');

function &getPDO($host, $db, $user, $pass, $charset)
{
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        return $pdo;
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}

function getRole($pdo, $host)
{
    $stmt = $pdo->prepare('SELECT * FROM performance_schema.replication_group_members WHERE MEMBER_HOST = ? LIMIT 1');
    $stmt->execute([$host]);
    $row = $stmt->fetch();
    return $row['MEMBER_ROLE'];
}

function getMaster($pdo)
{
    $stmt = $pdo->query('SELECT * FROM performance_schema.replication_group_members WHERE MEMBER_ROLE = "PRIMARY" LIMIT 1');
    $row = $stmt->fetch();
    return $row['MEMBER_HOST'];
}

$charset = 'utf8mb4';
$host = $pool[rand(0, count($pool) - 1)];
if (count($pool) > 1) {
    $pdo_tmp = &getPDO($host, $db, $user, $pass, $charset);
    $host_type = getRole($pdo_tmp, $host);

    if ($host_type == 'PRIMARY') {
        $db_w = $pdo_tmp;
        \array_splice($pool, array_search($host, $pool), 1);
        $host = $pool[rand(0, count($pool) - 1)];
        $db_r = &getPDO($host, $db, $user, $pass, $charset);
    } else {
        $db_r = $pdo_tmp;
        $host = getMaster($pdo_tmp);
        $db_w = &getPDO($host, $db, $user, $pass, $charset);
    }
} else {
    $db_r = &getPDO($host, $db, $user, $pass, $charset);
    $db_w = $db_r;
}


if (!(isset($db_r) && isset($db_w))) {
    throw new Exception('Connections failed');
    die('An error occurred');
}