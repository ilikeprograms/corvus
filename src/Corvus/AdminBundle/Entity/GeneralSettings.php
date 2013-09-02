<?php

// src/Corvus/AdminBundle/Entity/GeneralSettings.php
namespace Corvus\AdminBundle\Entity;


/**
 * Corvus\AdminBundle\Entity\GeneralSettings
 */
class GeneralSettings
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $portfolio_title
     */
    private $portfolio_title;

    /**
     * @var string $portfolio_subtitle
     */
    private $portfolio_subtitle;

    /**
     * @var boolean $display_subtitle
     */
    private $display_subtitle;

    /**
     * @var string $path
     */
    private $path;

    /**
     * @var file $logo
     */
    private $logo;

    /**
     * @var boolean $display_logo
     */
    private $display_logo;

    /**
     * @var string $global_general_meta_title
     */
    private $global_general_meta_title;

    /**
     * @var string $about_meta_title
     */
    private $about_meta_title;

    /**
     * @var string $education_meta_title
     */
    private $education_meta_title;

    /**
     * @var string $skills_meta_title
     */
    private $skills_meta_title;

    /**
     * @var string $work_history_meta_title
     */
    private $work_history_meta_title;

    /**
     * @var string $project_history_meta_title
     */
    private $project_history_meta_title;

    /**
     * @var string $global_work_history_meta_title
     */
    private $global_work_history_meta_title;

    /**
     * @var string $global_project_history_meta_title
     */
    private $global_project_history_meta_title;

    /*
     * @var string $analytics
     */
    private $analytics;

    /**
     * @var string $footer_text
     */
    private $footer_text;

    /**
     * @var string $template_choice
     */
    private $template_choice;

    /**
     * @var string $theme_choice
     */
    private $theme_choice;

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
     * @param boolean $displaySubTitle
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
     * Set about_meta_title
     *
     * @param string $aboutMetaTitle
     */
    public function setAboutMetaTitle($aboutMetaTitle)
    {
        $this->about_meta_title = $aboutMetaTitle;
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
     * @param string $globalWorkHistoryMetaTitle
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

    /**
     * Set template_choice
     *
     * @param string $templateChoice
     */
    public function setTemplateChoice($templateChoice)
    {
        $this->template_choice = $templateChoice;
    }

    /**
     * Get template_choice
     *
     * @return string
     */
    public function getTemplateChoice()
    {
        return $this->template_choice;
    }

    /**
     * Set theme_choice
     *
     * @param string $themeChoice
     */
    public function setThemeChoice($themeChoice)
    {
        $this->theme_choice = $themeChoice;
    }

    /**
     * Get theme_choice
     *
     * @return string
     */
    public function getThemeChoice()
    {
        return $this->theme_choice;
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