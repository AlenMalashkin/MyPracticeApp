<?php 
namespace App\Lib;
use PDO;

class Db
{
	protected $db;

	public function __construct()
	{
		$config = require 'App/Config/db.php';
		$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['name'].'', $config['user'], $config['password']);
	}

	public function Query($sql, $params = [])
	{
		$query = $this->db->prepare($sql, $params);

		if (!empty($params))
		{
			foreach ($params as $k => $v) 
			{
				$query->bindValue(':'.$k, $v);
			}
		}

		$query->execute();
		return $query;
	}

	public function Row($sql, $params = [])
	{
		$result = $this->Query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function Column($sql, $params = [])
	{
		$result = $this->Query($sql, $params);
		return $result->fetchColumn();
	}

	public function Fetch($sql, $params = [])
	{
		$result = $this->Query($sql, $params);
		return $result->fetch(PDO::FETCH_ASSOC);
	}
}