<?php
class Address {}
class Name
{
    protected $firstName;
    protected $lastName;
}
class Entrepeneur
{
    /** @type Name */
    protected $name;
    /** @type Address */
    protected $address;
}
class EntrepeneurInformationTemplate
{
    protected $length;
    public function getLength(){}
}
class TemplateProgress
{
    protected $questionsCount;
    protected $skipped;
    protected $completed;
    protected $uncompleted;
    /** @type Entrepeneur */
    protected $entrepeneur;

    public function __construct($questionsCount)
    {
        $this->questionsCount = $questionsCount;
    }
    public function getSkippedPercentage(){}
    public function getCompletedPercentage(){}
    public function getUncompletedPercentage(){}
}
class ProgressTable
{}
class GetPercentageOfCapturedData
{
    public function calculatePercentageOfCapturedData(Entrepeneur $entrepeneur)
    {
        $template = new EntrepeneurInformationTemplate();
        $progressTable = new ProgressTable();

        $progress = $progressTable->findProgressForEntrepeneur($entrepeneur, $template);

        return $progress;
    }
}
