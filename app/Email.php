<?php

namespace App;

use Illuminate\Mail\Mailable;

class Email extends Mailable
{
	public $attributes;
	
	public function __construct($attributes = null)
	{
		$this->attributes = $attributes;
	}
	
	public function build()
	{
		foreach ($this->attributes as $a => $v)
		{
			if ($a == 'view' && is_array($v))
			{
				$this->view($v[0])->with($v[1]);
				continue;
			}
			
			if (method_exists($this, $a))
			{
				if (is_array($v))
					call_user_func_array([$this, $a], $v);
				else
					$this->{$a}($v);
				
				continue;
			}
			
			if (method_exists($this, $v))
			{
				if ($a == 'replyTo')
					$this->replyTo(config('mail.reply_to.address'), config('mail.reply_to.name'));
			}
		}
	}
}
