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
			if (method_exists($this, $a))
			{
				if (empty($v))
				{
					if ($a == 'replyTo')
						$this->replyTo(config('mail.reply_to.address'), config('mail.reply_to.name'));
					else
						continue;
				}
				if (is_array($v))
					call_user_func_array($this->{$a}, $v);
				else
					$this->{$a}($v);
			}
		}
	}
}
