<?php

/**
 * Controller 环境相关接口控制器基类
 */
abstract class Controller_V2_Api_Environment_Base extends Controller_V2_Api_Base
{
	public function __construct()
	{
		$this->check_api_auth();
	}
}
