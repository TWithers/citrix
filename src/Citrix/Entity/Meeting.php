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
class Group extends EntityAbstract implements EntityAware
{
    
    /**
     * Unique identifier, in Citrix World
     * this is called meetingId
     * 
     * @var integer
     */
    public $id;
    
    /**
     * The subject of the meeting. 100 characters maximum. The characters '>' and '<' have to be replaced with the corresponding html character code (&gt; for '>' and &lt; for '<')
     *
     * @var String
     */
    public $subject;
    
    /**
     * The starting time of the meeting. Required ISO8601 UTC string, e.g. 2015-07-01T22:00:00Z
     *
     * @var String
     */
    public $starttime;

    /**
     * The ending time of the meeting. Required ISO8601 UTC string, e.g. 2015-07-01T22:00:00Z
     *
     * @var String
     */
    public $endtime;

    /**
     * A required string. Can be one of the following options:
     *
     * @var boolean
     */
    public $passwordrequired;
    
    /**
     * A required string. Can be one of the following options:
     * PSTN (PSTN only), 
     * Free (PSTN and VoIP), 
     * Hybrid, (PSTN and VoIP), 
     * Private (you provide numbers and access code), or 
     * VoIP (VoIP only). 
     * You may also enter plain text for numbers and access codes with a limit of 255 characters
     *
     * @var string
     */
    public $conferencecallinfo;

    /**
     * DEPRECATED. Must be provided and set to empty string ''
     *
     * @var String
     */
    public $timezonekey = '';

    /**
     * The meeting type = ['immediate', 'recurring', 'scheduled']
     *
     * @var String;
     */
     public $meetingtype;

     /**
      * The URL to join the meeting
      *
      * @var String
      */
     public $joinURL;

     /**
      * The maximum number of participants allowed in the meeting
      *
      * @var integer
      */
     public $maxParticipants;


    


    
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
        $data = $this->getData();
        foreach($data as $key=>$val){
            if(property_exists($this,$key)){
                $this->{$key}=$val;
                continue;
            }
            switch($key){
                case 'meetingId': case 'meetingid':
                    $this->id = $val;
                    break;
                case 'startTime':
                    $this->starttime = $val;
                    break;
                case 'endTime':
                    $this->endtime = $val;
                    break;
                 case 'passwordRequired':
                    $this->passwordrequired = $val;
                    break;
                case 'conferenceCallInfo':
                    $this->conferencecallinfo = $val;
                    break;
                case 'meetingType':
                    $this->meetingtype = $val;
                    break;
            }            
        }
    }
    
    function setId($id) { $this->id = $id; return $this; }
    function getId() { return $this->id; }
    function setSubject($subject) { $this->subject = $subject; return $this; }
    function getSubject() { return $this->subject; }
    function setStartTime($starttime) { $this->starttime = $starttime; return $this; }
    function getStartTime() { return $this->starttime; }
    function setEndTime($endtime) { $this->endtime = $endtime; return $this; }
    function getEndTime() { return $this->endtime; }
    function setPasswordRequired($passwordrequired) { $this->passwordrequired = $passwordrequired; return $this; }
    function getPasswordRequired() { return $this->passwordrequired; }
    function setConferenceCallInfo($conferencecallinfo) { $this->conferencecallinfo = $conferencecallinfo; return $this; }
    function getConferenceCallInfo() { return $this->conferencecallinfo; }
    function setMeetingType($meetingtype) { $this->meetingtype = $meetingtype; return $this; }
    function getMeetingType() { return $this->meetingtype; }
    function setJoinURL($joinURL) { $this->joinURL = $joinURL; return $this; }
    function getJoinURL() { return $this->joinURL; }
    function setMaxParticipants($maxParticipants) { $this->maxParticipants = $maxParticipants; return $this; }
    function getMaxParticipants() { return $this->maxParticipants; }
}
