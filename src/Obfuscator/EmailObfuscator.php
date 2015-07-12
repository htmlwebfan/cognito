<?php

namespace HTMLWebFan\Cognito\Obfuscator;

	/**
	 * Obfuscator class.
	 * Author: Matthew Way
	 * URL: http://www.htmlwebfan.com
	 */

/**
 * Class EmailObfuscator
 * @package HTMLWebFan\Cognito\Obfuscator
 */
class EmailObfuscator extends ObfuscatorAbstract implements ObfuscatorInterface
{

	/**
	 * @var string
	 */
	protected $mailto = '';


	/**
	 * @param Config $settings
	 */
	public function __construct(Config $settings)
	{
		$this->subject = $settings::EMAIL_ADDRESS;
		$this->mailto = 'mailto:' . $settings::EMAIL_ADDRESS;
	}

	/**
	 * @return string
	 * @throws LogicException
	 */
	public function generateJSMapVariable()
	{
		if (!isset($this->map)) {
			throw new LogicException("You must have a map to use for obfuscation.
			If you have removed the default map string, you must replace it with one.");
		}
		return implode("','", str_split($this->map));
	}

	/**
	 * @param null $str
	 * @return mixed|string
	 * @throws LogicException
	 */
	public function generateJSKeyVariable($str = null)
	{
		if(isset($str)){
			$this->setSubject($str);
		}

		return $this->generateKeys($this->subject);
	}

	/**
	 * @param $email
	 * @throws InvalidArgumentException
	 */
	public function setEmailAddress($email)
	{
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			throw new InvalidArgumentException("You must provide a properly formatted email address.");
		}
		$this->subject = $email;
	}

	/**
	 * @return string
	 * @throws LogicException
	 */
	public function generateJS()
	{
		$str = "
		$(document).ready(function(){

			var idx = [{$this->generateJSKeyVariable()}];
			var mtidx = [{$this->generateJSKeyVariable($this->mailto)}]
			var map = ['{$this->generateJSMapVariable()}'];
			addy = generateAdd(idx,map);
			mto = generateAdd(mtidx,map);
			$('<a/>',{href:mto,text:addy}).appendTo('.obfuscatedem');
		});

				function generateAdd(idx,map){
					var e = '';
					for(var i=0;i<idx.length;i++){
						e += map[idx[i]];
			}
			return e;
		}
		";

		return $str;
	}

	/**
	 * @param $str
	 * @return string
	 * @throws LogicException
	 */
	public function generateKeys($str)
	{
		if (!isset($this->map)) {
			throw new LogicException("You must have a map to use for obfuscation.
			If you have removed the default map string, you must replace it with one.");
		}

		$arr = str_split($str);
		$enc = [];

		for ($i = 0; $i < count($arr); $i++) {
			array_push($enc, strpos($this->map, $arr[$i]));
		}
		return implode(',', $enc);
	}

	/**
	 * @param bool|true $die
	 */
	public function debug($die = true)
	{
		echo "<pre>";
		print_r($this);
		echo "</pre>";
		if ($die) {
			die();
		}
	}

}

