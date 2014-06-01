<?php

namespace My\Lib;

class Template
{	

	public function render($page, $data = array())
	{	
		require $page;
	}

}