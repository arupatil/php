<?php

/**
* Linked List Class
* Author - Aruna Patil
**/
class Node {
	public Node $NEXT;
	public $DATA;
	function __construct($val) {
		$this->DATA = $val;
	}
}

class LinkedList {
	public $head;

	function add($val) {
		if( !$this->head ){
			$this->head = new Node($val);
		} else {
			$p = $this->head;
			while( $p ) {
				if( !isset($p->NEXT) ) {
					$p->NEXT = new Node($val);
					break;
				} else $p = $p->NEXT;
			}
		}
		return;
	}

	function addFirst($val) {
		if( !$this->head ) {
			$this->head = new Node($val);
		} else {
			$p = $this->head;
			$n = new Node($val);
			$this->head = $n;
			$n->NEXT = $p; 
		}
		return;
	}

	function addLast($val) {
		$this->add($val);
		return;
	}

	function print() {
		if( !$this->head ) {
			echo "Empty set!!";
			return false;
		} else {
			$p = $this->head;
			$count = 1;
			while($p) {
				echo "Node $count :: Data ::" . $p->DATA."<br>";
				$count++;
				if( isset($p->NEXT) ) {
					$p = $p->NEXT;
				} else return;
			} 
		}
	}
}

$list = new LinkedList();
$list->add(4);
$list->add(5);
$list->add(6);
$list->add(7);
$list->add(8);
$list->add(9);
$list->add(10);
$list->addFirst(2);
$list->addLast(12);
$list->print();

/***
** OUTPUT FOR ABOVE 
Node 1 :: Data ::2
Node 2 :: Data ::4
Node 3 :: Data ::5
Node 4 :: Data ::6
Node 5 :: Data ::7
Node 6 :: Data ::8
Node 7 :: Data ::9
Node 8 :: Data ::10
Node 9 :: Data ::12
****/