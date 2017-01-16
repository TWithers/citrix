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
     * this is called OrganizerKey
     * 
     * @var integer
     */
    public $id;
    
    /**
     * First Name
     * 
     * @var String
     */
    public $firstName;
    
    /**
     * Last Name
     * 
     * @var String
     */
    public $lastName;
    
    /**
     * Email
     * 
     * @var String
     */
    public $email;

    /**
     * Group Id or Group Key
     *
     * @var integer
     */
     public $groupId;

     /**
     * Group Name
     * 
     * @var String
     */
    public $groupName;

     /**
     * The status of the organizer, i.e. whether the organizer is able to host meetings = ['active', 'suspended'],
     * 
     * @var String
     */
    public $status;

     /**
     * The maximum number of attendees allowed at sessions hosted by this organizer.
     * 
     * @var integer
     */
    public $maxNumAttendeesAllowed;

    /**
     * The products the organizer has access to, can be 'G2M', 'G2W', 'G2T' or 'OPENVOICE'
     * 
     * @var Array[String]
     */
    public $products;

    


    
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
        
        $this->id            = $data['organizerKey'];
        $this->email         = $data['email'];
        $this->firstName     = $data['firstName'];
        $this->lastName      = $data['lastName'];

        if(isset($data['groupId'])){
            $this->groupName = $data['groupName'];
            $this->groupId = $data['groupId'];
        }
        
        if (isset($data['status'])) {
            $this->status = $data['status'];
        }
        if (isset($data['maxNumAttendeesAllowed'])) {
            $this->maxNumAttendeesAllowed = $data['maxNumAttendeesAllowed'];
        }
        if(isset($data['products'])){
            $this->products = $data['products'];
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
     * @return the $groupId
     */
    public function getGroupId()
    {
        return $this->groupId;
    }
    
    /**
     *
     * @param String $groupId          
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
        
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
     * @return the $maxNumAttendeesAllowed
     */
    public function getMaxNumAttendeesAllowed()
    {
        return $this->maxNumAttendeesAllowed;
    }
    
    /**
     *
     * @param string $maxNumAttendeesAllowed          
     */
    public function setMaxNumAttendeesAllowed($maxNumAttendeesAllowed)
    {
        $this->maxNumAttendeesAllowed = $maxNumAttendeesAllowed;
        
        return $this;
    }
    /**
     *
     * @return the $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     *
     * @param string $firstName          
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        
        return $this;
    }
    /**
     *
     * @return the $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     *
     * @param string $lastName          
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        
        return $this;
    }
    /**
     *
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     *
     * @param string $email          
     */
    public function setEmail($email)
    {
        $this->email = $email;
        
        return $this;
    }
    /**
     *
     * @return the $products
     */
    public function getProducts()
    {
        return $this->products;
    }
    
    /**
     *
     * @param string $products          
     */
    public function setProducts($products)
    {
        if(is_array($products)){
            $this->products = $products;
        }else{
            $this->products = [$products];
        }
        
        return $this;
    }
}
