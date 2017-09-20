<?php

// Warning! This code was generated by WSDL2PHP tool. 
// author: Filippov Andrey <afi.work@gmail.com> 
// see https://solo-framework-lib.googlecode.com 

namespace Moneta\Types;

/**
 * Ответ на запрос FindLegalInformationRequest.
	 * Response to FindLegalInformationRequest.
	 * 
 */
class FindLegalInformationResponse
{
	
	/**
	 * 
	 *
	 * @var LegalInformation
	 */
	 public $legalInformation = null;

	/**
	 * 
	 *
	 * @param LegalInformation
	 *
	 * @return void
	 */
	public function addLegalInformation(LegalInformation $item)
	{
		$this->legalInformation[] = $item;
	}

}