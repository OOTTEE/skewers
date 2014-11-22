<?php 
class Administrador extends AppModel{
	public $hasOne = 'User';
	public $useTable = false;
}