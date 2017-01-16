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
     * this is called GroupKey
     * 
     * @var integer
     */
    public $id;
    
    /**
     * Group Name
     * 
     * @var String
     */
    public $groupName;
    
    /**
     * Parent Key
     * 
     * @var integer
     */
    public $parentKey;
    
    /**
     * Number of Organizers in Group
     * 
     * @var integer
     */
    public $numOrganizers;
    
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
        
        $this->id            = $data['groupKey'];
        $this->groupName     = $data['groupName'];
        $this->numOrganizers = $data['numOrganizers'];
        
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['parentKey'])) {
            $this->status = $data['parentKey'];
        }
        
    }
    
    /**
     *
     * @return the $groupName
     */
    public function getGroupName()
    {
        return $this->groupName;
    }
    
    /**
     *
     * @param String $groupName          
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;
        
        return $this;
    }
    
    /**
     *
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     *
     * @param String $id          
     */
    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     *
     * @return the $status
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     *
     * @param String $status          
     */
    public function setStatus($status)
    {
        $this->status = $status;
        
        return $this;
    }
    
    /**
     *
     * @return the $numOrganizers
     */
    public function getNumOrganizers()
    {
        return $this->numOrganizers;
    }
    
    /**
     *
     * @param string $numOrganizers          
     */
    public function setNumOrganizers($numOrganizers)
    {
        $this->numOrganizers = $numOrganizers;
        
        return $this;
    }
    /**
     *
     * @return the $parentKey
     */
    public function getParentKey()
    {
        return $this->parentKey;
    }
    
    /**
     *
     * @param string $parentKey          
     */
    public function setParentKey($parentKey)
    {
        $this->parentKey = $parentKey;
        
        return $this;
    }
}
