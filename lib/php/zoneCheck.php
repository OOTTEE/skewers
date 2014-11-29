<?php

if( getcwd() !=  $_SERVER['DOCUMENT_ROOT'].'/skewers/controller' OR getcwd() != $_SERVER['DOCUMENT_ROOT'].'/skewers' )
	header('Location: /');
