<?php


/*
* Copyright (c) 2008-2016 vip.com, All Rights Reserved.
*
* Powered by com.vip.osp.osp-idlc-2.5.11.
*
*/

namespace com\vip\adp\api\open\service;

class GoodsSkuInfo {
	
	static $_TSPEC;
	public $sizeId = null;
	public $saleProps = null;
	public $leavingStock = null;
	public $saleStockStatus = null;
	public $vipPrice = null;
	public $marketPrice = null;
	
	public function __construct($vals=null){
		
		if (!isset(self::$_TSPEC)){
			
			self::$_TSPEC = array(
			1 => array(
			'var' => 'sizeId'
			),
			2 => array(
			'var' => 'saleProps'
			),
			3 => array(
			'var' => 'leavingStock'
			),
			4 => array(
			'var' => 'saleStockStatus'
			),
			5 => array(
			'var' => 'vipPrice'
			),
			6 => array(
			'var' => 'marketPrice'
			),
			
			);
			
		}
		
		if (is_array($vals)){
			
			
			if (isset($vals['sizeId'])){
				
				$this->sizeId = $vals['sizeId'];
			}
			
			
			if (isset($vals['saleProps'])){
				
				$this->saleProps = $vals['saleProps'];
			}
			
			
			if (isset($vals['leavingStock'])){
				
				$this->leavingStock = $vals['leavingStock'];
			}
			
			
			if (isset($vals['saleStockStatus'])){
				
				$this->saleStockStatus = $vals['saleStockStatus'];
			}
			
			
			if (isset($vals['vipPrice'])){
				
				$this->vipPrice = $vals['vipPrice'];
			}
			
			
			if (isset($vals['marketPrice'])){
				
				$this->marketPrice = $vals['marketPrice'];
			}
			
			
		}
		
	}
	
	
	public function getName(){
		
		return 'GoodsSkuInfo';
	}
	
	public function read($input){
		
		$input->readStructBegin();
		while(true){
			
			$schemeField = $input->readFieldBegin();
			if ($schemeField == null) break;
			$needSkip = true;
			
			
			if ("sizeId" == $schemeField){
				
				$needSkip = false;
				$input->readString($this->sizeId);
				
			}
			
			
			
			
			if ("saleProps" == $schemeField){
				
				$needSkip = false;
				
				$this->saleProps = array();
				$input->readMapBegin();
				while(true){
					
					try{
						
						$key0 = 0;
						$input->readI32($key0); 
						
						$val0 = '';
						$input->readString($val0);
						
						$this->saleProps[$key0] = $val0;
					}
					catch(\Exception $e){
						
						break;
					}
				}
				
				$input->readMapEnd();
				
			}
			
			
			
			
			if ("leavingStock" == $schemeField){
				
				$needSkip = false;
				$input->readI32($this->leavingStock); 
				
			}
			
			
			
			
			if ("saleStockStatus" == $schemeField){
				
				$needSkip = false;
				$input->readI32($this->saleStockStatus); 
				
			}
			
			
			
			
			if ("vipPrice" == $schemeField){
				
				$needSkip = false;
				$input->readString($this->vipPrice);
				
			}
			
			
			
			
			if ("marketPrice" == $schemeField){
				
				$needSkip = false;
				$input->readString($this->marketPrice);
				
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
		
		if($this->sizeId !== null) {
			
			$xfer += $output->writeFieldBegin('sizeId');
			$xfer += $output->writeString($this->sizeId);
			
			$xfer += $output->writeFieldEnd();
		}
		
		
		if($this->saleProps !== null) {
			
			$xfer += $output->writeFieldBegin('saleProps');
			
			if (!is_array($this->saleProps)){
				
				throw new \Osp\Exception\OspException('Bad type in structure.', \Osp\Exception\OspException::INVALID_DATA);
			}
			
			$output->writeMapBegin();
			foreach ($this->saleProps as $kiter0 => $viter0){
				
				$xfer += $output->writeI32($kiter0);
				
				$xfer += $output->writeString($viter0);
				
			}
			
			$output->writeMapEnd();
			
			$xfer += $output->writeFieldEnd();
		}
		
		
		if($this->leavingStock !== null) {
			
			$xfer += $output->writeFieldBegin('leavingStock');
			$xfer += $output->writeI32($this->leavingStock);
			
			$xfer += $output->writeFieldEnd();
		}
		
		
		if($this->saleStockStatus !== null) {
			
			$xfer += $output->writeFieldBegin('saleStockStatus');
			$xfer += $output->writeI32($this->saleStockStatus);
			
			$xfer += $output->writeFieldEnd();
		}
		
		
		if($this->vipPrice !== null) {
			
			$xfer += $output->writeFieldBegin('vipPrice');
			$xfer += $output->writeString($this->vipPrice);
			
			$xfer += $output->writeFieldEnd();
		}
		
		
		if($this->marketPrice !== null) {
			
			$xfer += $output->writeFieldBegin('marketPrice');
			$xfer += $output->writeString($this->marketPrice);
			
			$xfer += $output->writeFieldEnd();
		}
		
		
		$xfer += $output->writeFieldStop();
		$xfer += $output->writeStructEnd();
		return $xfer;
	}
	
}

?>