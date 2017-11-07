<?php
/**
 * Table schema convert markdown
 * 
 * 參數 
 *    --showindex    預設為不顯示，設定後則顯示
 *    {table名}      table名稱可以多個 空白隔開
 * 
 *
 * @var        integer
 */
$argvStart = 1;
$showindex = FALSE;
foreach($argv as $key => $value){
    if($value=="--showindex"){
        $showindex = TRUE;
        $argvStart++;
    }
}

if (count($argv) == $argvStart) {
  throw new InvalidArgumentException('Missing tables');
}

$dbhost = '192.168.4.154';
$dbuser = 'root';
$dbpass = 'xxxx';
$dbname = 'xxxx';



$tables = array_slice($argv, $argvStart);
$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
foreach ($tables as $table) {
  //find FK
  $query = $db->query("select * from INFORMATION_SCHEMA.KEY_COLUMN_USAGE where TABLE_SCHEMA = '$dbname' AND TABLE_NAME = '$table' and  CONSTRAINT_NAME <> 'PRIMARY' ");
  $FK_array = array();
  while (($row = $query->fetch(PDO::FETCH_NAMED))) {
    $FK_array[$row['COLUMN_NAME']] = $row['REFERENCED_TABLE_NAME'] .".". $row['REFERENCED_COLUMN_NAME'];
  }

  $table_comment = "";
  $query = $db->query("SHOW TABLE STATUS WHERE Name='$table' ");
  if (($row = $query->fetch(PDO::FETCH_NUM))) {
    $table_comment = $row['Comment'];
  }

  $query = $db->query("SHOW FULL COLUMNS FROM $table");
  echo "# $table : $table_comment\n";
  echo "| 欄位名 | 類型 | 是否為空 | 預設值 | 索引 | 備註 |\n";
  echo "| --- | --- | --- | --- | --- | --- |\n";
  while (($row = $query->fetch(PDO::FETCH_NUM))) {
    list($field, $type, , $nullable, $key, $default, $extra, , $comment) = $row;
    $comment = str_replace(["\n", '|'], ['<br />', '-'], $comment);
    $default = empty($extra) ? $default : $extra;
    $nullable = $nullable;
    foreach($FK_array as $FK_key => $FK_val){
      if($FK_key == $field){
        $key .= (empty($key)?"":"、") . "FK:". $FK_key ."->". $FK_val;
      }
    }

    echo "| $field | $type | $nullable | $default | $key | $comment |\n";
  }

  //find index  
  if($showindex){
    echo "\n";
    $query = $db->query("SHOW INDEX FROM $table where Key_name <> 'PRIMARY'");
    echo "# $table : INDEX\n";
    echo "| index名 | index順序 | 欄位名 | type |\n";
    echo "| --- | --- | --- | --- |\n";
    while (($row = $query->fetch(PDO::FETCH_NAMED))) {
      echo "| ".$row['Key_name']." | ".$row['Seq_in_index']." | ".$row['Column_name']." | ".$row['Index_type']." |\n";
    }
  }


  echo "\n\n";
}