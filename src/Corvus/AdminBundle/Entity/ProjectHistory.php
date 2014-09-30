<?php

// src/Corvus/AdminBundle/Entity/ProjectHistory.php
namespace Corvus\AdminBundle\Entity;
        
use Corvus\CoreBundle\Entity\TableViewEntity;


/**
 * Corvus\AdminBundle\Entity\ProjectHistory
 */
class ProjectHistory extends TableViewEntity
{
    // Entity Name is needed to use Late static binding with TableViewEntity
    const ENTITY_NAME = 'projectHistory';
    
    
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $slug
     */
    private $slug;

    /**
     * @var string $project_name
     */
    private $project_name;

    /**
     * @var string $project_description
     */
    private $project_description;

    /**
     * @var string $role
     */
    private $role;

    /**
     * @var string $process
     */
    private $process;

    /**
     * @var string $feedback_received
     */
    private $feedback_received;

    /**
     * @var string $reflection
     */
    private $reflection;

    /**
     * @var string $url
     */
    private $url;

    /**
     * @var datetime $updated
     */
    private $updated;

    /**
     * @var string $isPublished
     */
    private $isPublished;

    /**
     * @var string $meta_title
     */
    private $meta_title;

    /**
     * @var string $meta_description
     */
    private $meta_description;

    public function __construct()
    {
        parent::__construct();

        $this->updated = new \DateTime('now');
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set slug.
     * 
     * @param string $slug
     * 
     * @return \Corvus\AdminBundle\Entity\ProjectHistory
     */
    public function setSlug($slug)
    {
        if ($slug !== NULL) {
            $this->slug = $slug;
        }
        
        return $this;
    }

    /**
     * Get slug.
     * 
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set project_name
     *
     * @param string $projectName
     */
    public function setProjectName($projectName)
    {
        $this->project_name = $projectName;
    }

    /**
     * Get project_name
     *
     * @return string 
     */
    public function getProjectName()
    {
        return $this->project_name;
    }

    /**
     * Set project_description
     *
     * @param string $projectDescription
     */
    public function setProjectDescription($projectDescription)
    {
        $this->project_description = $projectDescription;
    }

    /**
     * Get project_description
     *
     * @return string 
     */
    public function getProjectDescription()
    {
        return $this->project_description;
    }

    /**
     * Set role
     *
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set process
     *
     * @param string $process
     */
    public function setProcess($process)
    {
        $this->process = $process;
    }

    /**
     * Get process
     *
     * @return string 
     */
    public function getProcess()
    {
        return $this->process;
    }

    /**
     * Set feedback_received
     *
     * @param string $feedbackReceived
     */
    public function setFeedbackReceived($feedbackReceived)
    {
        $this->feedback_received = $feedbackReceived;
    }

    /**
     * Get feedback_received
     *
     * @return string 
     */
    public function getFeedbackReceived()
    {
        return $this->feedback_received;
    }

    /**
     * Set reflection
     *
     * @param string $reflection
     */
    public function setReflection($reflection)
    {
        $this->reflection = $reflection;
    }

    /**
     * Get reflection
     *
     * @return string 
     */
    public function getReflection()
    {
        return $this->reflection;
    }

    /**
     * Set url
     *
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
    
    /**
     * Set updated
     *
     * @param string $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * Get updated
     *
     * @return string 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set isPublished.
     * 
     * @param string $isPublished If this entity should be published or not.
     * 
     * @return \Corvus\AdminBundle\Entity\ProjectHistory
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;

        return $this;
    }
    
    /**
     * Get isPublished.
     * 
     * @return string
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * Set meta_title
     *
     * @param string $metaTitle
     */
    public function setMetaTitle($metaTitle)
    {
        $this->meta_title = $metaTitle;
    }

    /**
     * Get meta_title
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->meta_title;
    }

    /**
     * Set meta_description
     *
     * @param string $metaDescription
     */
    public function setMetaDescription($metaDescription)
    {
        $this->meta_description = $metaDescription;
    }

    /**
     * Get meta_description
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->meta_description;
    }
}