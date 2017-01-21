<?php
/**
 * 潘
 * Changed by JerryPan 2013-08-03 11:03
 *
 *
 * Original info:
 *        A simple wrapper for PDO.
 *        Inspired by the sweet PDO wrapper from http://www.fractalizer.ru
 *
 * @author  Anis uddin Ahmad <anisniit@gmail.com>
 *
 * @link    http://www.ajaxray.com/blog/2009/08/29/simple-php-pdo-wrapper-light-static-easy-to-use/
 * @link    http://www.fractalizer.ru/frpost_120/php-pdo-wrapping-and-making-sweet/
 */
class DB
{
	private static $_pdoObjectsArr = array();
	private static $_lastDbNumber = 0;

	private static $_connectionStrsArr = array();
	private static $_usernameArr = array();
	private static $_passwordArr = array();
	private static $_dbNameArr = array();

	private static $_fetchMode = \PDO::FETCH_ASSOC;
	private static $_driverOptions = array();

	/**
	 * Set connection information
	 *
	 * @param int    $dbNumber which number of db
	 * @param string $hostname host name
	 * @param string $port     port
	 * @param string $username db user name
	 * @param string $password db password
	 * @param string $dbname   db name
	 *
	 * @example    DB::setConnectionInfo(1, 'localhost', 'root', 'admin', 'dbname');
	 */
	public static function setConnectionInfo($dbNumber, $hostname, $port, $username, $password, $dbname)
	{
		if($dbNumber < 1) {
			_fatal_error('dbNum < 1', __FILE__, __LINE__);
		}
		self::$_connectionStrsArr[$dbNumber] = "mysql:host=$hostname;port=$port;dbname=$dbname;";
		self::$_usernameArr[$dbNumber] = $username;
		self::$_passwordArr[$dbNumber] = $password;
		self::$_dbNameArr[$dbNumber] = $dbname;
	}

	/**
	 * Execute a statement and returns number of effected rows
	 *
	 * Should be used for query which doesn't return resultset
	 *
	 * @param   int    $dbNumber    database number
	 * @param   string $sql         SQL statement
	 * @param   array  $params      an array of values
	 *
	 * @return  integer number of effected rows
	 *
	 * @example    DB::query(1, 'SET NAMES utf8');
	 *             DB::query(1, 'UPDATE tblUserLimitGifts SET sGifts = ? WHERE sUid = 1982445707', array("i'm a student"));
	 *             DB::query(1, 'INSERT INTO f_users_ext SET id = :id, name = :name', array('id' => '1982445707', 'name' => 'pjf'));
	 *             DB::query(1, 'DELETE FROM tblUserLimitGifts WHERE sUid = 1982445707');
	 */
	public static function query($dbNumber, $sql, array $params = array())
	{
		$statement = self::_query($dbNumber, $sql, $params);
		self::$_lastDbNumber = $dbNumber;

		return $statement->rowCount();
	}

	/**
	 * Insert into table use array
	 *
	 * @param int $dbNumber
	 * @param string $tableName
	 * @param array $kvArr A kv Array
	 *
	 * @return int
	 */
	public static function simpleInsert($dbNumber, $tableName, $kvArr)
	{
		$columns = array();
		$values = array();
		foreach($kvArr as $column => $value) {
			$columns[] = "$column = ?";
			$values[] = $value;
		}
		$set_statment = join(', ', $columns);
		$sql = "INSERT INTO {$tableName} SET $set_statment";

		if($values) {
			$statement = self::_query($dbNumber, $sql, $values);
			self::$_lastDbNumber = $dbNumber;

			return $statement->rowCount();
		}
		else {
			return 0;
		}
	}

	/**
	 * Replace into table use array
	 *
	 * @param int $dbNumber
	 * @param string $tableName
	 * @param array $kvArr A kv Array
	 *
	 * @return int
	 */
	public static function simpleReplace($dbNumber, $tableName, $kvArr)
	{
		$columns = array();
		$values = array();
		foreach($kvArr as $column => $value) {
			$columns[] = "$column = ?";
			$values[] = $value;
		}
		$set_statment = join(', ', $columns);
		$sql = "REPLACE INTO {$tableName} SET $set_statment";

		if($values) {
			$statement = self::_query($dbNumber, $sql, $values);
			self::$_lastDbNumber = $dbNumber;

			return $statement->rowCount();
		}
		else {
			return 0;
		}
	}

	/**
	 * Update table use array
	 *
	 * @param int $dbNumber
	 * @param string $tableName
	 * @param array $kvArr A kv Array
	 * @param array $whereArr A kv Array
	 *
	 * @return int
	 */
	public static function simpleUpdate($dbNumber, $tableName, $kvArr, $whereArr)
	{
		$whereColumns = array();
		$whereValues = array();
		foreach($whereArr as $whereColumn => $whereValue) {
			unset($kvArr[$whereColumn]);

			$whereColumns[] = "$whereColumn = ?";
			$whereValues[] = $whereValue;
		}

		$columns = array();
		$values = array();
		foreach($kvArr as $column => $value) {
			$columns[] = "$column = ?";
			$values[] = $value;
		}

		foreach($whereValues as $vv) {
			$values[] = $vv;
		}

		$set_statment = join(', ', $columns);
		$where_statment = join(' AND ', $whereColumns);
		$sql = "UPDATE {$tableName} SET $set_statment WHERE $where_statment";

		if($values && $whereArr) {
			$statement = self::_query($dbNumber, $sql, $values);
			self::$_lastDbNumber = $dbNumber;

			return $statement->rowCount();
		}
		else {
			return 0;
		}
	}

	/**
	 * Check table exists
	 *
	 * @param int    $dbNumber
	 * @param string $tableName
	 *
	 * @return array
	 */
	public static function tableExists($dbNumber, $tableName)
	{
		if(!isset(self::$_dbNameArr[$dbNumber])) {
			_fatal_error('DB check tableExists error!, $tableName = ' . $tableName . ', there is no $dbNumber:', $dbNumber);
		}
		$databasename = self::$_dbNameArr[$dbNumber];

		return self::fetchRow($dbNumber, "SELECT table_name FROM information_schema.tables WHERE table_schema = '$databasename' AND table_name = '$tableName'");
	}

	/**
	 * Execute a statement and returns a single value
	 *
	 * @param   int    $dbNumber    database number
	 * @param   string $sql         SQL statement
	 * @param   array  $params      an array of values
	 *
	 * @return  string if find, false otherwise
	 *
	 * @example    DB::fetchOne(1, 'SELECT count(*) FROM tblUsers');
	 *             DB::fetchOne(1, 'SELECT sName FROM tblUsers WHERE sUid = ?', array(100002845459110));
	 */
	public static function fetchOne($dbNumber, $sql, array $params = array())
	{
		$statement = self::_query($dbNumber, $sql, $params);
		self::$_lastDbNumber = $dbNumber;

		return $statement->fetchColumn(0);
	}

	/**
	 * Execute a statement and returns the first row
	 *
	 * @param   int    $dbNumber    database number
	 * @param   string $sql         SQL statement
	 * @param   array  $params      an array of values
	 *
	 * @return  array   A result row
	 *
	 * @example    DB::fetchRow(1, 'SELECT * FROM tblUsers WHERE sUid = 100002845459110');
	 *             DB::fetchRow(1, 'SELECT * FROM tblUsers WHERE sUid = ?', array(100002845459110));
	 */
	public static function fetchRow($dbNumber, $sql, array $params = array())
	{
		$statement = self::_query($dbNumber, $sql, $params);
		self::$_lastDbNumber = $dbNumber;

		return $statement->fetch(self::$_fetchMode);
	}

	/**
	 * Execute a statement and returns row(s) as 2D array
	 *
	 * @param   int    $dbNumber    database number
	 * @param   string $sql         SQL statement
	 * @param   array  $params      an array of values
	 *
	 * @return  array   Result rows
	 *
	 * @example    DB::fetchAll(1, 'SELECT * FROM tblUserLimitGifts');
	 *             DB::fetchAll(1, 'SELECT * FROM tblUserLimitGifts WHERE sUid = ? OR sUid = ?', array(100002845459110, 1982445707));
	 */
	public static function fetchAll($dbNumber, $sql, array $params = array())
	{
		$statement = self::_query($dbNumber, $sql, $params);
		self::$_lastDbNumber = $dbNumber;

		return $statement->fetchAll(self::$_fetchMode);
	}

	/**
	 * Get last insert id
	 *
	 * @param   string $sequenceName    sequenceName
	 *
	 * @return  int
	 *
	 * @example DB::lastInsertId(1);
	 */
	public static function lastInsertId($sequenceName = null)
	{
		return self::$_pdoObjectsArr[self::$_lastDbNumber]->lastInsertId($sequenceName);
	}

	/**
	 * @param int $dbNumber
	 *
	 * @return \PDO
	 */
	public static function getPDOObject($dbNumber = -1)
	{
		if($dbNumber === -1) {
			$dbNumber = self::$_lastDbNumber;
		}
		if(!isset(self::$_pdoObjectsArr[$dbNumber])) {
			self::_connect($dbNumber);
		}

		return self::$_pdoObjectsArr[$dbNumber];
	}

	/**
	 * Begin transaction
	 *
	 * @param $dbNumber
	 *
	 * @example
	 *      DB::beginTransaction($dbNumber);
	 *      try {
	 *      DB::query($dbNumber, 'UPDATE tblUserLimitGifts SET sGifts = ? WHERE sUid = 1982445707', array("xixi"));
	 *      DB::query($dbNumber, 'UPDATE tblUserLimitGifts SET sGiftss = ? WHERE sUid = 1982445707', array("lulu"));
	 *      DB::commitTransaction($dbNumber);
	 *      Zend_Debug::dump('commit');
	 *    }
	 *      catch (\PDOException $e){
	 *      echo $e->getMessage();
	 *      DB::rollbackTransaction($dbNumber);
	 *      Zend_Debug::dump('rollback');
	 *    }
	 */
	public static function beginTransaction($dbNumber)
	{
		if(!isset(self::$_pdoObjectsArr[$dbNumber])) {
			self::_connect($dbNumber);
		}
		self::$_pdoObjectsArr[$dbNumber]->beginTransaction();
	}

	/**
	 * Commit transaction
	 *
	 * @param int $dbNumber
	 */
	public static function commitTransaction($dbNumber = -1)
	{
		if($dbNumber === -1) {
			$dbNumber = self::$_lastDbNumber;
		}
		self::$_pdoObjectsArr[$dbNumber]->commit();
	}

	/**
	 * Rollback transaction
	 *
	 * @param $dbNumber
	 */
	public static function rollbackTransaction($dbNumber = -1)
	{
		if($dbNumber === -1) {
			$dbNumber = self::$_lastDbNumber;
		}
		self::$_pdoObjectsArr[$dbNumber]->rollBack();
	}

	private static function _connect($dbNumber)
	{
		if($dbNumber < 1) {
			_fatal_error('dbNum < 1', __FILE__, __LINE__);
		}

		try{
				self::$_pdoObjectsArr[$dbNumber] = new \PDO(
					self::$_connectionStrsArr[$dbNumber],
					self::$_usernameArr[$dbNumber],
					self::$_passwordArr[$dbNumber],
					self::$_driverOptions
				);
		} catch (\PDOException $e) {
			if (class_exists('XLog'))
			{
				XLog::formatLog("PDOException", $e->getMessage(), XLog::$errorFile);
			}
			echo $e->getMessage();exit;
		}
	}

	/**
	 * Prepare and returns a PDOStatement
	 *
	 * @param   int    $dbNumber    database number
	 * @param   string $sql         SQL statement
	 * @param   array  $params      Parameters. an array of values
	 *
	 * @throws  \PDOException
	 * @return  \PDOStatement
	 */
	private static function _query($dbNumber, $sql, $params = array())
	{
		if(!isset(self::$_pdoObjectsArr[$dbNumber])) {
			self::_connect($dbNumber);
		}

		if (class_exists('XLog'))
		{
			XLog::formatLog("PDO Query Sql", "sql $sql", XLog::$errorFile);
		}

		$statement = self::$_pdoObjectsArr[$dbNumber]->prepare($sql, self::$_driverOptions);

		if((!$statement->execute($params)) || ($statement->errorCode() != '00000')) {
			$errorInfo = $statement->errorInfo();
			$mes = "Database error [{$errorInfo[0]}]: {$errorInfo[2]}, sql: $sql, params: ".json_encode($params).", driver error code is $errorInfo[1]";
			throw new \PDOException($mes);
		}

		return $statement;
	}

	/**
	 * @param int $dbNumber
	 */
	public static function setDbNumber($dbNumber)
	{
		self::$_lastDbNumber = $dbNumber;
	}

	/**
	 * @return int
	 */
	public static function getDbNumber()
	{
		return self::$_lastDbNumber;
	}
}
/**
 * Concrete class for generating debug dumps related to the output source.
 *
 * @category   Zend
 * @package    Zend_Debug
 */
class Zend_Debug
{

    /**
     * @var string
     */
    protected static $sapi = null;

    /**
     * Get the current value of the debug output environment.
     * This defaults to the value of PHP_SAPI.
     *
     * @return string;
     */
    public static function getSapi()
    {
        if (self::$sapi === null) {
            self::$sapi = PHP_SAPI;
        }
        return self::$sapi;
    }

    /**
     * Set the debug output environment.
     * Setting a value of null causes Zend_Debug to use PHP_SAPI.
     *
     * @param string $sapi
     * @return void;
     */
    public static function setSapi($sapi)
    {
        self::$sapi = $sapi;
    }

    /**
     * Debug helper function.  This is a wrapper for var_dump() that adds
     * the <pre /> tags, cleans up newlines and indents, and runs
     * htmlentities() before output.
     *
     * @param  mixed  $var   The variable to dump.
     * @param  string $label OPTIONAL Label to prepend to output.
     * @param  bool   $echo  OPTIONAL Echo output if true.
     * @return string
     */
    public static function dump($var, $label=null, $echo=true)
    {
        // format the label
        $label = ($label===null) ? '' : rtrim($label) . ' ';

        // var_dump the variable into a buffer and keep the output
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // neaten the newlines and indents
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        if (self::getSapi() == 'cli') {
            $output = PHP_EOL . $label
                . PHP_EOL . $output
                . PHP_EOL;
        } else {
            if (!extension_loaded('xdebug')) {
                $output = htmlspecialchars($output, ENT_QUOTES);
            }

            $output = '<pre>'
                . $label
                . $output
                . '</pre>';
        }

        if ($echo) {
            echo($output);
        }
        return $output;
    }

}

class Zend_Registry extends ArrayObject
{
	/**
	 * Registry object provides storage for shared objects.
	 * @var Zend_Registry
	 */
	private static $_registry = null;

	/**
	 * Retrieves the default registry instance.
	 *
	 * @return Zend_Registry
	 */
	public static function getInstance()
	{
		if(self::$_registry === null) {
			self::$_registry = new Zend_Registry();
		}

		return self::$_registry;
	}

	/**
	 * Unset the default registry instance.
	 * Primarily used in tearDown() in unit tests.
	 * @returns void
	 */
	public static function _unsetInstance()
	{
		self::$_registry = null;
	}

	/**
	 * getter method, basically same as offsetGet().
	 *
	 * This method can be called from an object of type Zend_Registry, or it
	 * can be called statically.  In the latter case, it uses the default
	 * static instance stored in the class.
	 *
	 * @param string $index - get the value associated with $index
	 *
	 * @return mixed
	 */
	public static function get($index)
	{
		$instance = self::getInstance();

		if(!$instance->offsetExists($index)) {
			return null;
		}

		return $instance->offsetGet($index);
	}

	/**
	 * setter method, basically same as offsetSet().
	 *
	 * This method can be called from an object of type Zend_Registry, or it
	 * can be called statically.  In the latter case, it uses the default
	 * static instance stored in the class.
	 *
	 * @param string $index The location in the ArrayObject in which to store
	 *                      the value.
	 * @param mixed  $value The object to store in the ArrayObject.
	 *
	 * @return void
	 */
	public static function set($index, $value)
	{
		$instance = self::getInstance();
		$instance->offsetSet($index, $value);
	}

	/**
	 * Returns TRUE if the $index is a named value in the registry,
	 * or FALSE if $index was not found in the registry.
	 *
	 * @param  string $index
	 *
	 * @return boolean
	 */
	public static function isRegistered($index)
	{
		if(self::$_registry === null) {
			return false;
		}

		return self::$_registry->offsetExists($index);
	}

	/**
	 * Constructs a parent ArrayObject with default
	 * ARRAY_AS_PROPS to allow acces as an object
	 *
	 * @param array   $array data array
	 * @param integer $flags ArrayObject flags
	 */
	public function __construct($array = array(), $flags = parent::ARRAY_AS_PROPS)
	{
		parent::__construct($array, $flags);
	}

	/**
	 * @param string $index
	 *
	 * @returns mixed
	 *
	 * Workaround for http://bugs.php.net/bug.php?id=40442 (ZF-960).
	 */
	public function offsetExists($index)
	{
		return array_key_exists($index, $this);
	}

}


function _p($var, $label=null)
{
    Zend_Debug::dump($var, $label);
    return $var;
}

function _fatal_error($a,$b,$c) {
    die($a);
}

function _get($key)
{
    return Zend_Registry::get($key);
}

function _set($key, $value)
{
    return Zend_Registry::set($key, $value);
}

function _isset($key)
{
    return Zend_Registry::isRegistered($key);
}
