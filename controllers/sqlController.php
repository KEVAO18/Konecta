
<?php

try {
	include_once ('conexionController.php');
} catch (\Throwable $th) {
	include_once ('../conexionController.php');
}

/**
 * @KEVAO18
 */
class sqlController extends conexionController{


	/**
	 * 
	 * @var conexionController $conexion Es un objeto de la clase conexion usado para conectarce con la bd
	 * 
	 */
	private $conexion;

	function __construct(){
		$this->conexion = new conexionController();
	}

	/**
	 * 
	 * @return PDO retorna un objeto de la clase conexionController
	 * 
	 */

	public function getConection(){
		return $this->conexion->conect();
	}

	/**
	 * 
	 * @param PDO $con
	 * 
	 * @return void
	 * 
	 */

	public function setConection($con){
		$this->conexion = $con;
	}

	/**
	 * 
	 * @param string $consulta consulta escrita en SQL
	 * 
	 * @return PDO conexion a la bd
	 * 
	 * @method consultaSQL(string $consulta) la consulta se escribe en sql con comillas dobles
	 * 
	 */

	public function consultaSQL(string $consulta) {
		$query = $this->getConection()->prepare($consulta);
		$query->execute();
		return $query;
	}

	/**
	 * 
	 * @param string $tabla es la tabla a la que se le quiere pedir la informacion
	 * 
	 * @return PDO datos obtenidos de la tabla
	 * 
	 * @method All($tabla) obtiene todos los datos de la tabla indicada
	 * 
	 */

	public function All($tabla){
		return $this->consultaSQL("SELECT * FROM $tabla");
	}

	/**
	 * 
	 * @param string $tabla es la tabla a la que se le quiere pedir la informacion
	 * 
	 * @param string $columna columnas que se desean obtener de la base de datos
	 * 
	 * @return PDO datos obtenidos de la tabla
	 * 
	 * @method AnyColumn($tabla, $columna) obtiene los datos de la tabla indicada en las columnas indicadas
	 * 
	 */

	public function AnyColumn($tabla, $columna){
		return $this->consultaSQL("SELECT $columna FROM $tabla");
	}

	/**
	 * 
	 * @param string $tabla es la tabla a la que se le quiere pedir la informacion
	 * 
	 * @param string $columna valor de comparacion especifico
	 * 
	 * @param string $val valor a comparar con la columna, puede variar
	 * 
	 * @param string $oper valor definido para el operador de la comparacion, definodo como '=' por defecto
	 * 
	 * @return PDO datos obtenidos de la tabla
	 * 
	 * @method where($tabla, $columna, $val) obtiene los datos obtenidos mediante las comparaciones realizadas
	 * 
	 * @method where($tabla, $columna, $val, $oper) obtiene los datos obtenidos mediante las comparaciones realizadas
	 * 
	 */
	
	public function where($tabla, $columna, $val, $oper = '='){
		return $this->consultaSQL("SELECT * FROM $tabla WHERE $columna $oper '$val'");
	}

	/**
	 * 
	 * @param string $tabla es la tabla a la que se le desean ingresar los datos
	 * 
	 * @param string $columnas columnas a insertar
	 * 
	 * @param string $valores valor de las columnas anteriormente ingresadas
	 * 
	 * @method insert($tabla, $columnas, $valores) ingresa los $valores en las $columnas de la $tabla
	 * 
	 */

	public function insert($tabla, $columnas, $valores) {
		$consulta = "INSERT INTO $tabla ($columnas) VALUES ($valores)";
		$this->consultaSQL($consulta);
	}

	/**
	 * 
	 * @param string $tabla es la tabla a la que se le  quiere eliminar informacion
	 * 
	 * @param string $columna columna de comparacion, generalmente es id o la columna de la clave primaria
	 * 
	 * @param string $val valor a comparar con la columna, puede variar
	 * 
	 * @param string $oper valor definido para eloperador de la comparacion, es = por defecto
	 * 
	 * @method delete($tabla, $columna, $val) elimina las entradas encontradas a partir de la comparacion
	 * 
	 * @method delete($tabla, $columna, $val, $oper = '=') elimina las entradas encontradas a partir de la comparacion
	 * 
	 */

	public function delete($tabla, $columna, $val, $oper = '='){
		$q = $this->consultaSQL("DELETE FROM $tabla WHERE $columna $oper '$val'");
		$q = $this->consultaSQL("ALTER TABLE $tabla AUTO_INCREMENT = 0");
	}

	/**
	 * 
	 * @param string $tabla es la tabla a la que se le quiere actualizar
	 * 
	 * @param string $columna columna definida para actualizar
	 * 
	 * @param int $id clave primaria de la tabla, usada para comparar campos y encontrar la fila deseada
	 * 
	 * @param string $val nuevo valor de la columna
	 * 
	 * @param string $oper valor definido para eloperador de la comparacion, es = por defecto
	 * 
	 * @method update($tabla, $columna, $id, $val, $oper = '=') el metodo se usa para actualizar datos de una columna definida previamente
	 * 
	 * @method update($tabla, $columna, $id, $val) el metodo se usa para actualizar datos de una columna definida previamente
	 * 
	 */

	public function update($tabla, $columna, $id, $val, $oper = '='){
		$q = $this->consultaSQL("UPDATE $tabla SET $columna = '$val' WHERE id $oper $id");
	}

	/**
	 * 
	 * @param string $tabla es la tabla principal, la cual funciona como base para la union
	 * 
	 * @param string $columnas columnas que se desean unir
	 * 
	 * @param string $unirCon tabla secundaria de la union
	 * 
	 * @param string $condicionante columna usada como indice o indicador en la condicion
	 * 
	 * @param string $condicion valor a buscar para realizar el emparejamiento y finalizar la union
	 * 
	 * @method innerJoin($tabla, $columnas, $unirCon, $condicionante, $condicion) metodo usado para optener tablas unidas por un elemento en comun
	 * 
	 * @return PDO tablas unidas
	 */

	public function innerJoin($tabla, $columnas, $unirCon, $condicionante, $condicion){
		return $this->consultaSQL("SELECT $columnas FROM $tabla INNER JOIN $unirCon ON $condicionante = $condicion");
	}

	/**
	 * 
	 * @param string $tabla es la tabla principal, la cual funciona como base para la union
	 * 
	 * @param string $columnas columnas que se desean unir
	 * 
	 * @param string $unirCon tabla secundaria de la union
	 * 
	 * @param string $condicionante columna usada como indice o indicador en la condicion, normamente es la llave primaria
	 * 
	 * @param string $condicion valor a buscar para realizar el emparejamiento y finalizar la union
	 * 
	 * @param string $condicionadoW condicionante o columna de condion del where
	 * 
	 * @param string $condicionW valor o condicion del where
	 * 
	 * @param string $oper valor definido para eloperador de la comparacion, es = por defecto
	 * 
	 * @method function innerJoinConWhere($tabla, $columnas, $unirCon, $condicionante, $condicion, $condicionW, $condicionadoW, $oper = '=') metodo usado para unir tablas con un where añadido para optener datos más precisos
	 * 
	 * @method function innerJoinConWhere($tabla, $columnas, $unirCon, $condicionante, $condicion, $condicionW, $condicionadoW) metodo usado para unir tablas con un where añadido para optener datos más precisos
	 * 
	 */

	public function innerJoinConWhere($tabla, $columnas, $unirCon, $condicionante, $condicion, $condicionW, $condicionadoW, $oper = '='){
		return $this->consultaSQL("SELECT $columnas FROM $tabla INNER JOIN $unirCon ON $condicionante = $condicion WHERE $condicionW $oper $condicionadoW");
	}

	/**
	 * 
	 * @param string $tabla es la tabla principal, la cual funciona como base para la union
	 * 
	 * @param string $columnas columnas que se desean unir
	 * 
	 * @param string $unirCon tabla secundaria de la union
	 * 
	 * @param string $condicionante columna usada como indice o indicador en la condicion
	 * 
	 * @param string $condicion valor a buscar para realizar el emparejamiento y finalizar la union
	 * 
	 * @method leftJoin($tabla, $columnas, $unirCon, $condicionante, $condicion) metodo usado para optener tablas unidas por un elemento en comun
	 * 
	 * @return PDO tablas unidas
	 */

	public function leftJoin($tabla, $columnas, $unirCon, $condicionante, $condicion){
		return $this->consultaSQL("SELECT $columnas FROM $tabla LEFT JOIN $unirCon ON $condicionante = $condicion");
	}

	/**
	 * 
	 * @param string $tabla es la tabla principal, la cual funciona como base para la union
	 * 
	 * @param string $columnas columnas que se desean unir
	 * 
	 * @param string $columnas 
	 * 
	 * @method LastRow($tabla, $ordenamiento, $columnas) metodo usado para optener la ultima fila de una tabla
	 * 
	 * @return PDO ultima columna
	 */
	public function LastRow($tabla, $ordenamiento, $columnas){
		return $this->consultaSQL("SELECT $columnas FROM $tabla ORDER BY $ordenamiento DESC LIMIT 1");
	}

}

?>