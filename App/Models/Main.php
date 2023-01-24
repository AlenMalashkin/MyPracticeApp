<?php 
namespace App\Models;
use App\Core\Model;

class Main extends Model
{
	public function SendComment()
	{
		if (isset($_POST['send_comment']))
		{
			$comment = $_POST['comment'];

			$this->db->Query('INSERT INTO comments (userid, comment, username) VALUES (:userid, :comment, :username)', 
				[
					'comment' => $comment,
					'userid' => $_SESSION['userid'],
					'username' => $_SESSION['username'],
				]
			);
		}
	}

	public function GetNews()
	{
		$result = $this->db->Row('SELECT * FROM comments');

		return $result;
	}

	public function DeleteComment()
	{
		if (isset($_POST['delete_comment']))
		{
			$result = $this->db->Query('DELETE FROM comments WHERE id = :id', 
				[
					'id' => (int)$_POST['delete_comment'],
				]
			);

			//Debug($result);
		}
	}
}