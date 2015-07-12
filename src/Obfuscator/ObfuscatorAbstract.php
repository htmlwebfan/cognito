<?php

namespace HTMLWebFan\Cognito\Obfuscator;

	/**
	 * Author: Matthew Way
	 * URL: http://www.htmlwebfan.com
	 */

/**
 * Class ObfuscatorAbstract
 * @package HTMLWebFan\Cognito\Obfuscator
 */
abstract class ObfuscatorAbstract
{

	/**
	 * @var string
	 */
	protected $subject = '';
	/**
	 * @var string
	 */
	protected $map = '1234567890abcdefghijklmnopqrstuvwxyz.@-:';


	/**
	 * @param $sub
	 */
	public function setSubject($sub)
	{
		$this->subject = $sub;
	}


	/**
	 * @param $map
	 */
	public function setMap($map)
	{
		$this->map = $map;
	}
}