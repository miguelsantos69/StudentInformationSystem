<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Classroom
 *
 * @ORM\Table(name="classroom")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClassroomRepository")
 */
class Classroom
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="mark", type="string", length=3)
     */
    private $mark;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @var string
     *
     * @ORM\Column(name="school_year_end", type="string", length=255)
     */
    private $schoolYearEnd;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Teacher", mappedBy="classroom", cascade={"persist"})
     */
    private $teacher;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Subject")
     */
    private $subject;
    
    /**
     * @ORM\OneToMany(targetEntity="Student", mappedBy="classroom")
     */
    private $student;


    public function __construct() {
        
        $this->teacher = new ArrayCollection();
        $this->subject = new ArrayCollection();
        $this->student = new ArrayCollection();
    }

    public function __toString() {
        
        return $this->mark . ' (' . $this->level . ')' . ' (' . $this->description . ')' . ' (' . $this->schoolYearEnd . ')';
    }
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set mark
     *
     * @param string $mark
     *
     * @return Classroom
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return string
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Classroom
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set level
     *
     * @param integer $level
     *
     * @return Classroom
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set schoolYearEnd
     *
     * @param string $schoolYearEnd
     *
     * @return Classroom
     */
    public function setSchoolYearEnd($schoolYearEnd)
    {
        $this->schoolYearEnd = $schoolYearEnd;

        return $this;
    }

    /**
     * Get schoolYearEnd
     *
     * @return string
     */
    public function getSchoolYearEnd()
    {
        return $this->schoolYearEnd;
    }

    
    /**
     * Add subject
     *
     * @param \AppBundle\Entity\Subject $subject
     *
     * @return Classroom
     */
    public function addSubject(\AppBundle\Entity\Subject $subject)
    {
        $this->subject[] = $subject;

        return $this;
    }

    /**
     * Remove subject
     *
     * @param \AppBundle\Entity\Subject $subject
     */
    public function removeSubject(\AppBundle\Entity\Subject $subject)
    {
        $this->subject->removeElement($subject);
    }

    /**
     * Get subject
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubject()
    {
        return $this->subject;
    }


    /**
     * Add teacher
     *
     * @param \AppBundle\Entity\Teacher $teacher
     *
     * @return Classroom
     */
    public function addTeacher(\AppBundle\Entity\Teacher $teacher)
    {
        $this->teacher[] = $teacher;

        return $this;
    }

    /**
     * Remove teacher
     *
     * @param \AppBundle\Entity\Teacher $teacher
     */
    public function removeTeacher(\AppBundle\Entity\Teacher $teacher)
    {
        $this->teacher->removeElement($teacher);
    }

    /**
     * Get teacher
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeacher()
    {
        return $this->teacher;
    }
    
    function setTeacher($teacher) {
        
        $this->teacher = $teacher;
        
        return $this;
    }



    /**
     * Add student
     *
     * @param \AppBundle\Entity\Student $student
     *
     * @return Classroom
     */
    public function addStudent(\AppBundle\Entity\Student $student)
    {
        $this->student[] = $student;

        return $this;
    }

    /**
     * Remove student
     *
     * @param \AppBundle\Entity\Student $student
     */
    public function removeStudent(\AppBundle\Entity\Student $student)
    {
        $this->student->removeElement($student);
    }

    /**
     * Get student
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudent()
    {
        return $this->student;
    }
    
    function setStudent($student) 
    {
        $this->student = $student;
    }

}
