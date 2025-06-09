<?php
$dsn = "mysql:host=localhost; dbname=store; charset=utf8";
$pdo = new PDO($dsn, 'root', '');


function all($table, $array = null, $str = null)
{
    global $pdo;
    $sql = "SELECT * FROM $table ";

    if (is_array($array)) {
        $tmp = array2sql($array);
        $sql = $sql . " WHERE " . join(" AND ", $tmp);
    } else {
        $sql .= $array;
    }

    $sql .= $str;

    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


function find($table, $id)
{
    global $pdo;

    if (is_array($id)) {
        $tmp = array2sql($id);
        $sql = "SELECT * FROM $table WHERE " . join(" AND ", $tmp);
    } else {
        $sql = "SELECT * FROM $table WHERE id='$id'";
    }
    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

function q($sql)
{
    global $pdo;

    return $pdo->query($sql)->fetchall(PDO::FETCH_ASSOC);
}


function update($table, $data)
{
    global $pdo;
    $tmp = array2sql($data);

    print_r($tmp);

    $sql = "UPDATE $table SET " . join(" , ", $tmp) . "
                        WHERE id='{$data['id']}'";

    echo $sql;
    return $pdo->exec($sql);
}


function insert($table, $data)
{
    global $pdo;
    $keys = array_keys($data);

    $sql = "INSERT INTO $table (`" . join("`,`", $keys) . "`) values('" . join("','", $data) . "')";
    echo $sql;
    return $pdo->exec($sql);
}

function save($table, $data)
{
    if (isset($data['id'])) {
        update($table, $data);
    } else {
        insert($table, $data);
    }
}

function array2sql($array)
{
    $tmp = [];
    foreach ($array as $key => $value) {
        $tmp[] = "`$key`='$value'";
    }
    return $tmp;
}


function del($table, $id)
{
    global $pdo;
    $sql = "DELETE FROM $table WHERE ";

    if (is_array($id)) {
        $tmp = array2sql($id);
        $sql .= join(" AND ", $tmp);
    } else {
        $sql .= "id='$id'";
    }
    return $pdo->exec($sql);
}


