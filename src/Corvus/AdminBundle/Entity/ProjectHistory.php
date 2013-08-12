<?php

namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Corvus\AdminBundle\Model\FileUploadInterface;
use Corvus\AdminBundle\Entity\FileUpload;

/**
 * Corvus\AdminBundle\Entity\ProjectHistory
 */
class ProjectHistory extends FileUpload implements FileUploadInterface
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $row_order
     */
    private $row_order;

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
     * @var arrayCollection $images
     */
    public $images;

    /**
     * @var datetime $updated
     */
    public $updated;

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
        $this->images = new ArrayCollection();
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
     * Set row_order
     *
     * @param integer $rowOrder
     */
    public function setRowOrder($rowOrder)
    {
        $this->row_order = $rowOrder;
    }

    /**
     * Get row_order
     *
     * @return integer 
     */
    public function getRowOrder()
    {
        return $this->row_order;
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
     * Add images
     *
     * @param Corvus\AdminBundle\Entity\Image $images
     */
    public function addImage(\Corvus\AdminBundle\Entity\Image $images)
    {
        $this->images[] = $images;
    }

    /**
     * Remove images
     *
     * @param Corvus\AdminBundle\Entity\Image $image
     */
    public function removeImage(\Corvus\AdminBundle\Entity\Image $images)
    {
        $this->images = null;
    }

    /**
     * Get images
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set meta_title
     *
     * @param string $meta_title
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
     * @param string $meta_description
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