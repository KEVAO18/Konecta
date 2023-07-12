<?php

try {
	@require_once(__DIR__."../serve.php");
} catch (\Throwable $th) {
	try {
		@require_once(__DIR__."../../serve.php");
	} catch (\Throwable $th) {
		require_once(__DIR__."../../../serve.php");
	}
}

/**
 * @KEVAO18
 */
class conexionController {

    public function __construct(){
    }

	/**
	 * 
	 * 
	 * 
	 */

    public function conect()
    {
		

		try {
			$con = "mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'].";charset=".$_ENV['DB_CHARSET'];

			$dns = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  PDO::ATTR_EMULATE_PREPARES => false];

			$pdo = new PDO($con,  $_ENV['DB_USER'], $_ENV['DB_PASS'], $dns);

			return $pdo;
		} catch (PDOException $e) {
			?>
			<div class="card p-4 text-center">
				<?=$e->getMessage()?>
			</div>
			<?php
		}
    }
}


?>