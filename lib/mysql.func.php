<?php
/**
 * ���ݿ�����
 * @return resource
 */
function connect()
{
    $con = mysql_connect(DB_HOST, DB_USER, DB_PWD);
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    } else {
        echo "Connect Success!" . "<br />";
    }
    mysql_select_db("Shop", $con);
    return $con;
}

/**
 * ���ݿ����
 * @param $table
 * @param $array
 * @return int
 */
function insert($table, $array)
{
    $keys = join(",", array_keys($array));
    $vals = join("'", array_values($array) . "'");
    $sql = "insert {$table}($keys) values({$vals})";
    mysql_query($sql);
    return mysql_insert_id();
}

/**
 * ���ݿ��޸�
 * @param $table
 * @param $array
 * @param null $where
 * @return int
 */
function update($table, $array, $where = null)
{
    $str = null;
    foreach ($array as $key => $val) {
        if ($str == null) {
            $sep = "";
        } else {
            $sep = ",";
        }
        $str .= $sep . $key . "='" . $val . "''";
    }
    $sql = "update {$table} set {$str} " . ($where == null ? null : "where " . $where);
    mysql_query($sql);
    return mysql_affected_rows();
}

/**
 * ���ݿ�ɾ��
 * @param $table
 * @param null $where
 * @return int
 */
function delete($table, $where = null)
{
    $where = $where == null ? null : " where" . $where;
    $sql = "delete from {$table} {$where} ";
    mysql_query($sql);
    return mysql_affected_rows();
}

/**
 * ��ѯ��������
 * @param $sql
 * @param int $result_type
 * @return array
 */
function fetchOne($sql,$result_type=MYSQL_ASSOC){
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result,$result_type);
    return $row;
}

/**
 * ��ѯ��������
 * @param $sql
 * @param int $result_type
 * @return array
 */
function fetchAll($sql,$result_type=MYSQL_ASSOC){
    $result = mysql_query($sql);
    while(@$row = mysql_fetch_array($result,$result_type)){
        $rows[] = $row;
    }
    return $rows;
}

/**
 * �������
 * @param $sql
 * @return int
 */
function getResultNum($sql){
    $result = mysql_query($sql);
    return mysql_num_rows($result);
}