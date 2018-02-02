<?php 
namespace orders;
class order 
{
	private $order;
	public function addOrder($nameOrder)
	{
		$this->order = $nameOrder;
		echo $this->order;
	}
}
?>