<?php

namespace HTMLWebFan\Cognito\Obfuscator;

	/**
	 * Interface for use with obfuscation classes.
	 * Author: Matthew Way
	 * URL: http://www.htmlwebfan.com
	 */

/**
 * Interface ObfuscatorInterface
 * @package HTMLWebFan\Cognito\Obfuscator
 */
interface ObfuscatorInterface
{
	/**
	 * @param $str
	 * @return mixed
	 */
	public function generateKeys($str);

	/**
	 * @return mixed
	 */
	public function generateJS();

	/**
	 * @param $sub
	 * @return mixed
	 */
	public function setSubject($sub);

	/**
	 * @param $map
	 * @return mixed
	 */
	public function setMap($map);
}