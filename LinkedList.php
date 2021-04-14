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