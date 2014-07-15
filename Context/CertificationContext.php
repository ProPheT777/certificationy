<?php
/**
* This file is part of the PhpStorm.
* (c) johann (johann_27@hotmail.fr)
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
**/

namespace Certificationy\Component\Certy\Context;

use Behat\Transliterator\Transliterator;
use JMS\Serializer\Annotation\Type;

class CertificationContext implements CertificationContextInterface
{
    /**
     * @var int
     * @Type("integer")
     */
    protected $numberOfQuestions;

    /**
     * @var string[]
     * @Type("array<string>")
     */
    protected $excludeCategories;

    /**
     * @var string[]
     * @Type("array<string>")
     */
    protected $excludeQuestions;

    /**
     * @var int
     * @Type("integer")
     */
    protected $score;

    /**
     * @var string
     * @Type("string")
     */
    protected $language;

    /**
     * @var int[]
     * @Type("array<integer>")
     */
    protected $threshold;

    /**
     * @var bool
     * @Type("boolean")
     */
    protected $debug;

    /**
     * @var string
     * @Type("string")
     */
    protected $name;

    /**
     * @var string
     * @Type("string")
     */
    protected $label;

    /**
     * @var string[]
     * @Type("array<string>")
     */
    protected $providers;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = Transliterator::urlize($name);
        $this->threshold = array();
        $this->excludeCategories = array();
        $this->excludeQuestions = array();
        $this->providers = array();

        $this->initialized();
    }

    protected function initialized()
    {

    }

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param int $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param string[] $certifiedThreshold
     */
    public function setThreshold(Array $certifiedThreshold)
    {
        foreach ($certifiedThreshold as $score => $thresholdName) {
            $this->addThreshold($score, $thresholdName);
        }
    }

    /**
     * @param int    $score
     * @param string $thresholdName
     */
    public function addThreshold($score, $thresholdName)
    {
        $this->threshold[$score] = $thresholdName;
    }

    /**
     * @param $score
     */
    public function removeThreshold($score)
    {
        unset($this->threshold[$score]);
    }

    /**
     * @return integer[]
     */
    public function getThreshold()
    {
        return $this->threshold;
    }

    /**
     * @param \string[] $excludeCategories
     */
    public function setExcludeCategories(Array $excludeCategories)
    {
        foreach ($excludeCategories as $categoryName) {
            $this->addExcludeCategory($categoryName);
        }
    }

    /**
     * @param string $categoryName
     */
    public function addExcludeCategory($categoryName)
    {
        $this->excludeCategories[$categoryName] = $categoryName;
    }

    /**
     * @param string $categoryName
     */
    public function removeExcludeCategory($categoryName)
    {
        unset($this->excludeCategories[$categoryName]);
    }

    /**
     * @return string[]
     */
    public function getExcludeCategories()
    {
        return $this->excludeCategories;
    }

    /**
     * @param \string[] $excludeQuestions
     */
    public function setExcludeQuestions(Array $excludeQuestions)
    {
        foreach ($excludeQuestions as $questionName) {
            $this->addExcludeQuestion($questionName);
        }
    }

    /**
     * @param string $questionName
     */
    public function addExcludeQuestion($questionName)
    {
        $this->excludeQuestions[] = $questionName;
    }

    /**
     * @param string $questionName
     */
    public function removeExcludeQuestion($questionName)
    {
        unset($this->excludeQuestions[$questionName]);
    }

    /**
     * @return string[]
     */
    public function getExcludeQuestions()
    {
        return $this->excludeQuestions;
    }

    /**
     * @param int $numberOfQuestion
     */
    public function setNumberOfQuestions($numberOfQuestion)
    {
        $this->numberOfQuestions = $numberOfQuestion;
    }

    /**
     * @return int
     */
    public function getNumberOfQuestions()
    {
        return $this->numberOfQuestions;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param boolean $debug
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }

    /**
     * @return boolean
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param array $data
     *
     * @return CertificationContext
     */
    public static function __set_state(Array $data)
    {
        $certificationContext = new CertificationContext($data['name']);
        $certificationContext->setNumberOfQuestions($data['numberOfQuestions']);
        $certificationContext->setExcludeCategories($data['excludeCategories']);
        $certificationContext->setExcludeQuestions($data['excludeQuestions']);
        $certificationContext->setScore($data['score']);
        $certificationContext->setLanguage($data['language']);
        $certificationContext->setThreshold($data['threshold']);
        $certificationContext->setDebug($data['debug']);
        $certificationContext->setLabel($data['label']);

        return $certificationContext;
    }
}
