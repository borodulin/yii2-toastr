<?php
/**
 * @link https://github.com/borodulin/codemirror
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/codemirror/blob/master/LICENSE.md
 */
namespace conquer\toastr;

use yii\helpers\Json;
use yii\helpers\Html;

class ToastrWidget extends \yii\base\Widget
{
	
	const POSITION_TOP_RIGHT = 'toast-top-right';
	const POSITION_TOP_LEFT = 'toast-top-left';
	const POSITION_TOP_CENTER = 'toast-top-center';	
	const POSITION_TOP_FULL_WIDTH = 'toast-top-full-width';
	const POSITION_BOTTOM_RIGHT = 'toast-bottom-right';
	const POSITION_BOTTOM_LEFT = 'toast-bottom-left';
	const POSITION_BOTTOM_CENTER = 'toast-bottom-center';
	const POSITION_BOTTOM_FULL_WIDTH = 'toast-bottom-full-width';
	
	const TYPE_SUCCESS = 'success';
	const TYPE_INFO = 'info';
	const TYPE_WARNING = 'warning';
	const TYPE_ERROR = 'error';
	
	const SHOW_METHOD_FADEIN = 'fadeIn';
	const SHOW_METHOD_SHOW = 'show';
	const HIDE_METHOD_FADEOUT = 'fadeOut';
	const HIDE_METHOD_HIDE = 'hide';
	
	const EASING_SWING = 'swing';
	const EASING_LINEAR = 'linear';
	
	public $closeButton = true;
	public $debug = false;
	public $newestOnTop =  true;
	public $progressBar = false;	
	public $positionClass = self::POSITION_BOTTOM_LEFT;
	public $preventDuplicates = false;
	public $onclick = null;
	public $showDuration = 300;
	public $hideDuration = 1000;
	public $timeOut = 5000;
	public $extendedTimeOut = 1000;
	public $showEasing = self::EASING_SWING;
	public $hideEasing = self::EASING_LINEAR;
	public $showMethod = self::SHOW_METHOD_FADEIN;
	public $hideMethod = self::HIDE_METHOD_FADEOUT;
	
	public $type = self::TYPE_SUCCESS;
	public $title;
	public $message;
	
	/**
	 * Initializes the widget.
	 * If you override this method, make sure you call the parent implementation first.
	 */
	public function init()
	{
		static $counter=0;
		$counter++;
	//	if($counter>1)
		//	throw new \Exception('Allowed only one widget "'.get_called_class().'"');
		parent::init();
	}
	
	/**
	 * @inheritdoc
	 */
	public function run()
	{
		$view = $this->view;
		$options=Json::encode([
			"closeButton" => $this->closeButton,
			"debug" => $this->debug,
			"newestOnTop" => $this->newestOnTop,
			"progressBar" => $this->progressBar,
			"positionClass" => $this->positionClass,
			"preventDuplicates" => $this->preventDuplicates,
			"onclick" => $this->onclick,
			"showDuration" => $this->showDuration,
			"hideDuration" => $this->hideDuration,
			"timeOut" => $this->timeOut,
			"extendedTimeOut" => $this->extendedTimeOut,
			"showEasing" => $this->showEasing,
			"hideEasing" => $this->hideEasing,
			"showMethod" => $this->showMethod,
			"hideMethod" =>$this->hideMethod,
		]);
		$view->registerJs("toastr.options=$options");		
		if($this->title && $this->message){
			$view->registerJs("toastr['{$this->type}']('".Html::encode($this->title)."','".Html::encode($this->message)."');");
		}
		ToastrAsset::register($view);
	}	
}