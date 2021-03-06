<?php


/*
* Copyright (c) 2008-2016 vip.com, All Rights Reserved.
*
* Powered by com.vip.osp.osp-idlc-2.5.11.
*
*/

namespace com\vip\pms\data\service;

class PmsCustomerPageConfigModel {
	
	static $_TSPEC;
	public $configPage = null;
	public $configValueList = null;
	public $configDesc = null;
	
	public function __construct($vals=null){
		
		if (!isset(self::$_TSPEC)){
			
			self::$_TSPEC = array(
			1 => array(
			'var' => 'configPage'
			),
			2 => array(
			'var' => 'configValueList'
			),
			3 => array(
			'var' => 'configDesc'
			),
			
			);
			
		}
		
		if (is_array($vals)){
			
			
			if (isset($vals['configPage'])){
				
				$this->configPage = $vals['configPage'];
			}
			
			
			if (isset($vals['configValueList'])){
				
				$this->configValueList = $vals['configValueList'];
			}
			
			
			if (isset($vals['configDesc'])){
				
				$this->configDesc = $vals['configDesc'];
			}
			
			
		}
		
	}
	
	
	public function getName(){
		
		return 'PmsCustomerPageConfigModel';
	}
	
	public function read($input){
		
		$input->readStructBegin();
		while(true){
			
			$schemeField = $input->readFieldBegin();
			if ($schemeField == null) break;
			$needSkip = true;
			
			
			if ("configPage" == $schemeField){
				
				$needSkip = false;
				$input->readString($this->configPage);
				
			}
			
			
			
			
			if ("configValueList" == $schemeField){
				
				$needSkip = false;
				
				$this->configValueList = array();
				$_size0 = 0;
				$input->readListBegin();
				while(true){
					
					try{
						
						$elem0 = null;
						$input->readString($elem0);
						
						$this->configValueList[$_size0++] = $elem0;
					}
					catch(\Exception $e){
						
						break;
					}
				}
				
				$input->readListEnd();
				
			}
			
			
			
			
			if ("configDesc" == $schemeField){
				
				$needSkip = false;
				$input->readString($this->configDesc);
				
			}
			
			
			
			if($needSkip){
				
				\Osp\Protocol\ProtocolUtil::skip($input);
			}
			
			$input->readFieldEnd();
		}
		
		$input->readStructEnd();
		
		
		
	}
	
	public function write($output){
		
		$xfer = 0;
		$xfer += $output->writeStructBegin();
		
		if($this->configPage !== null) {
			
			$xfer += $output->writeFieldBegin('configPage');
			$xfer += $output->writeString($this->configPage);
			
			$xfer += $output->writeFieldEnd();
		}
		
		
		$xfer += $output->writeFieldBegin('configValueList');
		
		if (!is_array($this->configValueList)){
			
			throw new \Osp\Exception\OspException('Bad type in structure.', \Osp\Exception\OspException::INVALID_DATA);
		}
		
		$output->writeListBegin();
		foreach ($this->configValueList as $iter0){
			
			$xfer += $output->writeString($iter0);
			
		}
		
		$output->writeListEnd();
		
		$xfer += $output->writeFieldEnd();
		
		if($this->configDesc !== null) {
			
			$xfer += $output->writeFieldBegin('configDesc');
			$xfer += $output->writeString($this->configDesc);
			
			$xfer += $output->writeFieldEnd();
		}
		
		
		$xfer += $output->writeFieldStop();
		$xfer += $output->writeStructEnd();
		return $xfer;
	}
	
}

?>