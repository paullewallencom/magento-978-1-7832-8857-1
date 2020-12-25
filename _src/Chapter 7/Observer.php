<?php

class Namespace_Module_Model_Observer
{
	public function changeRobots($observer)
	{
		if($observer->getEvent()->getAction()->getFullActionName() == 'catalog_category_view')
		{
			$uri = $observer->getEvent()->getAction()->getRequest()->getRequestUri();
			if(stristr($uri,"?")): // looking for a ?
				$layout       = $observer->getEvent()->getLayout();
				$product_info = $layout->getBlock('head');
				$layout->getUpdate()->addUpdate('<reference name="head"><action method="setRobots"><value>NOINDEX,FOLLOW</value></action></reference>');
				$layout->generateXml();
			endif;
		}
		return $this;
	}
}