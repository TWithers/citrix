<?php
namespace Citrix\Entity;

/**
 * Consumer Entity
 *
 * Contains all fields for registratns and attendees. Consumer
 * is an entity that merges both registratns and attendees.
 *
 * @uses \Citrix\Entity\EntityAbstract
 * @uses \Citrix\Entity\EntityAware
 *      
 */
class PastMeeting extends Meeting implements EntityAware
{
    
    public $firstName;
    public $lastName;
    public $email;
    public $organizerKey;
    public $duration;    
    public $numAttendees;
    public $accountKey;
    public $sessionId;
    public $locale;
    
    /**
     * Begin here by injecting authentication object.
     *
     * @param $client
     */
    public function __construct($client)
    {
        $this->setClient($client);
    }
    
    /*
     * (non-PHPdoc) @see \Citrix\Entity\EntityAware::populate()
     */
    public function populate()
    {
        parent::populate();
        $data = $this->getData();
        foreach($data as $key=>$val){
            if(property_exists($this,$key)){
                $this->{$key}=$val;
                continue;
            }
        }
    }
    
    function setFirstName($firstName) { $this->firstName = $firstName; return $this; }
    function getFirstName() { return $this->firstName; }
    function setLastName($lastName) { $this->lastName = $lastName; return $this; }
    function getLastName() { return $this->lastName; }
    function setEmail($email) { $this->email = $email; return $this; }
    function getEmail() { return $this->email; }
    function setOrganizerKey($organizerKey) { $this->organizerKey = $organizerKey; return $this; }
    function getOrganizerKey() { return $this->organizerKey; }
    function setDuration($duration) { $this->duration = $duration; return $this; }
    function getDuration() { return $this->duration; }
    function setNumAttendees($numAttendees) { $this->numAttendees = $numAttendees; return $this; }
    function getNumAttendees() { return $this->numAttendees; }
    function setAccountKey($accountKey) { $this->accountKey = $accountKey; return $this; }
    function getAccountKey() { return $this->accountKey; }
    function setSessionId($sessionId) { $this->sessionId = $sessionId; return $this; }
    function getSessionId() { return $this->sessionId; }
    function setLocale($locale) { $this->locale = $locale; return $this; }
    function getLocale() { return $this->locale; }
}
