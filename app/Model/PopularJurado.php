<?php 
class PopularJurado extends AppModel{
	public $hasOne = 'Usuario';
	public $useTable = false;
}