<?php 
class Exception
{
	protected $message = 'Unknown exception';
	private $string; // __toString cache
	protected $code = 0; // user defined exception
	protected $file; 
	protected $line;
	private $trace;
	private $previous;

	public function __construct($message = null, $code = 0,Exception $previous = null);
	final private function __clone();		
	final public function getMessage();
	final public function getFile();
	final public function getLine();
	final public function getTrace();
	final public function getPrevious();
	final public function getTraceAsString();

	public function __toString();
}
?>