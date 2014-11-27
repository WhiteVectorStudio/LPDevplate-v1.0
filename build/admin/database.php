<?php
/**
 * Created by IntelliJ IDEA.
 * User: den
 * Date: 14.08.14
 * Time: 10:44
 */

class Database {

	public static $fields = [];

	protected static $pdo;

	public static function load($file){
		if(!is_file($file)){
			file_put_contents($file,'');
			static::$pdo = new PDO('sqlite:'.$file);
			if(static::createTable(static::$fields)){
				return true;
			}
		}else{
			static::$pdo = new PDO('sqlite:'.$file);
			if(static::createTable(static::$fields)){
				return true;
			}
		}
	}

	public static function createTable($fields){
		if(is_array($fields)){
			$tableFields = 'id INTEGER PRIMARY KEY AUTOINCREMENT,addDate TEXT,status INTEGER DEFAULT 1,';
			foreach($fields as $field){
				if(isset($field['name'])) {
					$tableFields .= "{$field['name']} ";
				}
				if(isset($field['type'])) {
					$tableFields .= "{$field['type']} ";
				}else{
					$tableFields .= "TEXT";
				}
				$tableFields.=',';
			}
			$tableFields = rtrim($tableFields,',');
			$newTableQuery = "create table if not exists leads (
				$tableFields
			)";
			static::$pdo->exec($newTableQuery);
			if(static::$pdo->errorCode()!='00000'){
				$error = static::$pdo->errorInfo();
				throw new \Exception('createTable Error:'.$error[2]);
			}else{
				return true;
			}
		}else{
			throw new \Exception('createFile Error');
		}
	}

	public static function Add($params){
		if(is_array($params)){
			$fields = '';
			$values = '';
			foreach($params as $key => $value){
				$fields.=$key.',';
				$values.='\''.$value.'\',';
			}
			$fields.='addDate';
			$values.='\''.date('d-m-Y H:i:s').'\'';
			$addQuery = "insert into leads ($fields) values ($values)";
			static::$pdo->exec($addQuery);
			if(static::$pdo->errorCode()!='00000'){
				$error = static::$pdo->errorInfo();
				throw new Exception('insertError Error:'.$error[2]);
			}else{
				return true;
			}
		}else{
			return false;
		}
	}

	public static function Update($params, $phone){
		if(is_array($params)){
			$values = '';

			foreach($params as $key => $value){
				$values.=$key.'=\''.$value.'\',';
			}
			$values = substr($values, 0, -1);

			$addQuery = "update leads set $values where phone = '$phone'";

			static::$pdo->exec($addQuery);
			if(static::$pdo->errorCode()!='00000'){
				$error = static::$pdo->errorInfo();
			   	throw new Exception('updateError Error:'.$error[2]);
			}else{
				return true;
			}
		}else{
			return false;
		}
	}

	public static function Get(){
		$table = '<tr><th class="heading">№</th>';
		foreach (static::$fields as $field){
			if(isset($field['title'])){
				$table.='<th align="center" class="heading">'.$field['title'].'</th>';
			}else{
				$table.='<th align="center" class="heading">'.$field['name'].'</th>';
			}
		}
		$table .= '<th  align="center" class="heading" style="width:95px;">Дата</th><th class="heading">Скрыть</th>'.'</tr>';
		$fields = static::$pdo->query('SELECT * FROM leads ORDER BY addDate DESC');
		while($row = $fields->fetch(PDO::FETCH_ASSOC)){
			if($row['status']){
				$table.='<tr><td>'.$row['id'].'</td>';
				foreach (static::$fields as $field){
					$table.='<td>'.$row[$field['name']].'</td>';
				}
				$table .= '<th>'.$row['addDate'].'</th>';
				$table.='<td align="center"><a class="status delete" id="'.$row['id'].'"> &times; </a>'.'</tr>';
			}
		}
		$table = '<table class="table table-condensed table-hover">'.$table.'</table>';
		return $table;
	}

	public static function GetHidden(){
		$table = '<tr><th class="heading">№</th>';
		foreach (static::$fields as $field){
			if(isset($field['title'])){
				$table.='<th align="center" class="heading">'.$field['title'].'</th>';
			}else{
				$table.='<th align="center" class="heading">'.$field['name'].'</th>';
			}
		}
		$table .= '<th align="center" class="heading" style="width:95px;">Дата</th><th class="heading">Показать</th>'.'</tr>';
		$fields = static::$pdo->query('SELECT * FROM leads ORDER BY addDate DESC');
		while($row = $fields->fetch(PDO::FETCH_ASSOC)){
			if(!$row['status']){
				$table.='<tr><td>'.$row['id'].'</td>';
				foreach (static::$fields as $field){
					$table.='<td>'.$row[$field['name']].'</td>';
				}
				$table .= '<th>'.$row['addDate'].'</th>';
				$table.='<td align="center"><a class="status show" id="'.$row['id'].'"> + </a>'.'</tr>';
			}
		}
		$table = '<table class="table table-condensed table-hover">'.$table.'</table>';
		return $table;
	}

	public static function isAlreadyAdded($phone){
		
		$fields = static::$pdo->query('select * from leads');

		while($row = $fields->fetch(PDO::FETCH_ASSOC)){

			if($row['phone'] == $phone){
				return true;
			}

		}

		return false;
	}

	public static function ChangeStatus($id, $status){
		$addQuery = "UPDATE leads SET status = $status WHERE id = $id";

		static::$pdo->exec($addQuery);
		if(static::$pdo->errorCode()!='00000'){
			$error = static::$pdo->errorInfo();
		   	throw new Exception('updateError Error:'.$error[2]);
		}else{
			return true;
		}
	}
}


/*
NULL. The value is a NULL value.

INTEGER. The value is a signed integer, stored in 1, 2, 3, 4, 6, or 8 bytes depending on the magnitude of the value.

REAL. The value is a floating point value, stored as an 8-byte IEEE floating point number.

TEXT. The value is a text string, stored using the database encoding (UTF-8, UTF-16BE or UTF-16LE).

BLOB
*/
