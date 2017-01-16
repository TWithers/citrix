<?php
namespace Citrix;

use Citrix\Authentication\Authentication;
use Citrix\Entity\Webinar;
use Citrix\Entity\Consumer;

/**
 * Use this to get/post data from/to Citrix.
 * 
 * @uses \Citrix\ServiceAbstract
 * @uses \Citrix\CitrixApiAware
 */
class GoToMeeting extends ServiceAbstract implements CitrixApiAware
{
    /**
     * Authentication Client
     * 
     * @var Citrix
     */
    private $client;

    private $baseURL = "https://api.citrixonline.com/G2M/rest/";

    /**
     * Begin here by passing an authentication class.
     * 
     * @param $client - authentication client
     */
     public function __construct($client){
        $this->setClient($client);
    }

    public function createMeeting($params) {
		$url = $this->baseURL . 'meetings';
		// print_r($params);
		$this->setHttpMethod('POST')
				->setUrl($url)
				->setParams($params)
				->sendRequest($this->getClient()->getAccessToken())
		        ->processResponse(true, "\\Citrix\\Entity\\Meeting");

		return $this->getResponse();
	}

    public function getPast(){
        $url = $this->baseURL . 'historicalMeetings';
        $this->setHttpMethod('GET')
				->setUrl($url)
				->sendRequest($this->getClient()->getAccessToken())
		        ->processResponse(false, "\\Citrix\\Entity\\PastMeeting");
    }

    /**
     *
     * @return the $client
     */
    private function getClient(){
        return $this->client;
    }

    /**
     *
     * @param Citrix $client          
     */
    private function setClient($client){
        $this->client = $client;
        return $this;
    }
    
    /* (non-PHPdoc)
     * @see \Citrix\CitrixApiAware::processResponse()
     */
    /**
     * @param bool $single    If we expect a single entity from the server, make this true.
     *                        Single webinar request wasn't working because it was looping its properties.
     */
    public function processResponse($single = false, $className){
        $response = $this->getResponse();
        $this->reset();

        if(isset($response['int_err_code'])){
            $this->addError($response['msg']);
        }
        
        if(isset($response['description'])){
            $this->addError($response['description']);
        }
        
        if($single === true) {
            $obj = new $className($this->getClient);
            $obj->setData($response)->populate();
            $this->setResponse($meeting);
        } else {
            $collection = new \ArrayObject(array());

            foreach ($response as $entity){
                $obj = new $className($this->getClient);
                $obj->setData($entity)->populate();
                $collection->append($obj);          
                        
            }

            $this->setResponse($collection);
        }
    }
}