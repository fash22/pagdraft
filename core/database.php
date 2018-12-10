<?php

class database
{
    private $link;
    private static $m_pInstance;

    private $mysql_host          = 'localhost';
    private $mysql_user          = 'root';
    private $mysql_password      = '';
    private $mysql_db            = 'pagdraft';

    public function __construct()
    {
		$dsn = 'mysql:host='.$this->mysql_host.';dbname='.$this->mysql_db.';charset=utf8';

		try {
			$options = array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
			);
		
			$this->link = new PDO($dsn, $this->mysql_user, $this->mysql_password, $options);
		
			$emulate_prepares_below_version = '5.1.17';
		    $serverversion = $this->link->getAttribute(PDO::ATTR_SERVER_VERSION);
			$emulate_prepares = (version_compare($serverversion, $emulate_prepares_below_version, '<'));
			$this->link->setAttribute(PDO::ATTR_EMULATE_PREPARES, $emulate_prepares);

		} catch (PDOException $e) {
			 $this->link = null;
			 
			if ( defined(debugSQL) && debugSQL === TRUE ) {
				print "Error!: " . $e->getMessage() . "<br/>";
			}
			die("Connect Failed");
		}
    }
	 
    public static function Instance()
    {
        if (!self::$m_pInstance)
            self::$m_pInstance = new PDODatabase();
			
        return self::$m_pInstance;
    }
	
    public static function Close()
    {
        if (self::$m_pInstance)
            self::$m_pInstance->closeLink();
    }
	
    public function closeLink()
    {
		$this->link = null;
    }

	public function isConnected()
	{
		return ( $this->link !== null && $this->link !== FALSE && $this->link->isConnected() );
	}
	
	public function Prepare( $query )
	{
		return $this->link->prepare( $query );
	}
	
	// Single queries 
	 public function Query( $query, $params=null )
	 {
		//$this->link->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
		//$this->link->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
		$sth = $this->link->prepare( $query );
		
		if ( $params !== null )
			foreach ( $params as $key => $value ){
				if(is_numeric($key)){
					$key++;
				}
				$sth->bindValue( $key, $value );
			}
				
		if ( $sth->execute() === true )
			return array( "result"=>true, "rows"=>$sth->rowCount(), "inserted_id"=>$this->link->lastInsertId() );
		else
			return false;
	 }
	 
	 public function QueryOne( $query, $params=null )
	 {
		$sth = $this->link->prepare( $query );
		
		if ( $params !== null )
			foreach ( $params as $key => $value ){
				if(is_numeric($key)){
					$key++;
				}
				$sth->bindValue( $key, $value );
			}
			
		$sth->execute();
		$results = $sth->fetch(PDO::FETCH_ASSOC);
		return $results; 
	 }
	 
	 public function QueryAll( $query, $params=null )
	 {
		$sth = $this->link->prepare( $query );
		
		if ( $params !== null )
			foreach ( $params as $key => $value ){
				if(is_numeric($key)){
					$key++;
				}
				$sth->bindValue( $key, $value );
			}
				
		$sth->execute();
		$results = $sth->fetchAll(PDO::FETCH_ASSOC);
		return $results; 
	 }
	 
	 

}
       
?>