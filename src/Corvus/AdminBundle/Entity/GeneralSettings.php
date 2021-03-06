<?php

// src/Corvus/AdminBundle/Entity/GeneralSettings.php
namespace Corvus\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM,

    Symfony\Component\Validator\Constraints as Assert;

/**
 * Corvus\AdminBundle\Entity\GeneralSettings
 * 
 * @ORM\Entity
 * @ORM\Table
 */
class GeneralSettings
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\Type(type="string")
     * @Assert\NotNull()
     * @Assert\Length(max=100)
     */
    private $portfolio_title;

    /**
     * @ORM\Column(type="string", nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $portfolio_subtitle;

    /**
     * @ORM\Column(type="boolean")
     * 
     * @Assert\Type(type="bool")
     */
    private $display_subtitle;

    /**
     * @ORM\Column(type="string", nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $path;

    /**
     * @var image $logo
     * 
     * @Assert\Image()
     */
    private $logo;

    /**
     * @ORM\Column(type="boolean")
     * 
     * @Assert\Type(type="bool")
     */
    private $display_logo;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $global_general_meta_title;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $home_meta_title;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $about_meta_title;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $education_meta_title;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $skills_meta_title;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $work_history_meta_title;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $project_history_meta_title;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $global_work_history_meta_title;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $global_project_history_meta_title;

    /**
     * @ORM\Column(type="string", nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=255)
     */
    private $analytics;

    /**
     * @ORM\Column(type="text", nullable=true)
     * 
     * @Assert\Type(type="string")
     * @Assert\Length(max=1500)
     */
    private $footer_text;

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
     * Set portfolio_title
     *
     * @param string $portfolioTitle
     */
    public function setPortfolioTitle($portfolioTitle)
    {
        $this->portfolio_title = $portfolioTitle;
    }

    /**
     * Get portfolio_title
     *
     * @return string 
     */
    public function getPortfolioTitle()
    {
        return $this->portfolio_title;
    }

    /**
     * Set portfolio_subtitle
     *
     * @param string $portfolioSubtitle
     */
    public function setPortfolioSubtitle($portfolioSubtitle)
    {
        $this->portfolio_subtitle = $portfolioSubtitle;
    }

    /**
     * Get portfolio_subtitle
     *
     * @return string 
     */
    public function getPortfolioSubtitle()
    {
        return $this->portfolio_subtitle;
    }

    /**
     * Set display_subtitle
     *
     * @param boolean $displaySubtitle
     */
    public function setDisplaySubtitle($displaySubtitle)
    {
        $this->display_subtitle = $displaySubtitle;
    }

    /**
     * Get display_subtitle
     *
     * @return boolean
     */
    public function getDisplaySubtitle()
    {
        return $this->display_subtitle;
    }
    
    /**
     * Set path
     * 
     * @param string path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }
    
    /**
     * Get path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set logo
     *
     * @param file logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * Get logo
     *
     * @return file
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set display_logo
     *
     * @param boolean displayLogo
     */
    public function setDisplayLogo($displayLogo)
    {
        $this->display_logo = $displayLogo;
    }

    /**
     * Get display_logo
     *
     * @return file
     */
    public function getDisplayLogo()
    {
        return $this->display_logo;
    }

    /**
     * Set global_general_meta_title
     *
     * @param string $globalGeneralMetaTitle
     */
    public function setGlobalGeneralMetaTitle($globalGeneralMetaTitle)
    {
        $this->global_general_meta_title = $globalGeneralMetaTitle;
    }

    /**
     * Get global_general_meta_title
     *
     * @return string
     */
    public function getGlobalGeneralMetaTitle()
    {
        return $this->global_general_meta_title;
    }
    
    /**
     * Get about_meta_title
     *
     * @return string
     */
    public function getAboutMetaTitle()
    {
        return $this->about_meta_title;
    }

    /**
     * Set about_meta_title
     *
     * @param string $aboutMetaTitle
     */
    public function setAboutMetaTitle($aboutMetaTitle)
    {
        $this->about_meta_title = $aboutMetaTitle;
    }

    /**
     * Get home_meta_title
     *
     * @return string
     */
    public function getHomeMetaTitle()
    {
        return $this->home_meta_title;
    }

    /**
     * Set home_meta_title
     *
     * @param string $homeMetaTitle
     */
    public function setHomeMetaTitle($homeMetaTitle)
    {
        $this->home_meta_title = $homeMetaTitle;
    }

    /**
     * Set education_meta_title
     *
     * @param string $educationMetaTitle
     */
    public function setEducationMetaTitle($educationMetaTitle)
    {
        $this->education_meta_title = $educationMetaTitle;
    }

    /**
     * Get education_meta_title
     *
     * @return string
     */
    public function getEducationMetaTitle()
    {
        return $this->education_meta_title;
    }

    /**
     * Set skills_meta_title
     *
     * @param string $skillsMetaTitle
     */
    public function setSkillsMetaTitle($skillsMetaTitle)
    {
        $this->skills_meta_title = $skillsMetaTitle;
    }

    /**
     * Get skills_meta_title
     *
     * @return string
     */
    public function getSkillsMetaTitle()
    {
        return $this->skills_meta_title;
    }

    /**
     * Set work_history_meta_title
     *
     * @param string $workHistoryMetaTitle
     */
    public function setWorkHistoryMetaTitle($workHistoryMetaTitle)
    {
        $this->work_history_meta_title = $workHistoryMetaTitle;
    }

    /**
     * Get work_history_meta_title
     *
     * @return string
     */
    public function getWorkHistoryMetaTitle()
    {
        return $this->work_history_meta_title;
    }

    /**
     * Set project_history_meta_title
     *
     * @param string $projectHistoryMetaTitle
     */
    public function setProjectHistoryMetaTitle($projectHistoryMetaTitle)
    {
        $this->project_history_meta_title = $projectHistoryMetaTitle;
    }

    /**
     * Get project_history_meta_title
     *
     * @return string
     */
    public function getProjectHistoryMetaTitle()
    {
        return $this->project_history_meta_title;
    }

    /**
     * Set global_work_history_meta_title
     *
     * @param string $globalWorkHistoryMetaTitle
     */
    public function setGlobalWorkHistoryMetaTitle($globalWorkHistoryMetaTitle)
    {
        $this->global_work_history_meta_title = $globalWorkHistoryMetaTitle;
    }

    /**
     * Get global_work_history_meta_title
     *
     * @return string
     */
    public function getGlobalWorkHistoryMetaTitle()
    {
        return $this->global_work_history_meta_title;
    }

    /**
     * Set global_project_history_meta_title
     *
     * @param string $globalProjectHistoryMetaTitle
     */
    public function setGlobalProjectHistoryMetaTitle($globalProjectHistoryMetaTitle)
    {
        $this->global_project_history_meta_title = $globalProjectHistoryMetaTitle;
    }

    /**
     * Get global_project_history_meta_title
     *
     * @return string
     */
    public function getGlobalProjectHistoryMetaTitle()
    {
        return $this->global_project_history_meta_title;
    }

    /**
     * Set analytics
     *
     * @param string $analytics
     */
    public function setAnalytics($analytics)
    {
        $this->analytics = $analytics;
    }

    /**
     * Get analytics
     *
     * @return string
     */
    public function getAnalytics()
    {
        return $this->analytics;
    }

    /**
     * Set footer_text
     *
     * @param string $footerText
     */
    public function setFooterText($footerText)
    {
        $this->footer_text = $footerText;
    }

    /**
     * Get footer_text
     *
     * @return string
     */
    public function getFooterText()
    {
        return $this->footer_text;
    }

    public function preUpload()
    {
        if (null !== $this->logo) {
            // do whatever you want to generate a unique name
            $this->setPath('logo.' . $this->logo->guessExtension());
        }
    }

    public function upload()
    {
        if (null === $this->logo) {
            return;
        }

        // if there is an error when moving the logo, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->logo->move($this->getUploadRootDir(), $this->path);

        unset($this->logo);
    }

    public function removeUpload()
    {
        if (($logo = $this->getUploadRootDir() . $this->path)) {
            unlink($logo);
        }
    }

    private function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    private function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads';
    }
}