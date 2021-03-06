<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Subject
 *
 * @ORM\Table(name="subject")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SubjectRepository")
 */
class Subject
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
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Teacher")
     */
    private $teacher;

    /**
     *
     * @ORM\ManyToMany(targetEntity="Classroom")
     */
    private $classroom; 
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Attendance", mappedBy="subject")
     */
    private $attendance;

    /**
     * Constructor
     */
    public function __construct() {
        
        $this->teacher = new ArrayCollection();
        $this->classroom = new ArrayCollection();
        $this->attendance = new ArrayCollection();
    }
            
    public function __toString() {
        
        return $this->title;
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
     * Set title
     *
     * @param string $title
     *
     * @return Subject
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    

    /**
     * Add teacher
     *
     * @param \AppBundle\Entity\Teacher $teacher
     *
     * @return Subject
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
    }

    
    /**
     * Add classroom
     *
     * @param \AppBundle\Entity\Classroom $classroom
     *
     * @return Subject
     */
    public function addClassroom(\AppBundle\Entity\Classroom $classroom)
    {
        $this->classroom[] = $classroom;

        return $this;
    }

    /**
     * Remove classroom
     *
     * @param \AppBundle\Entity\Classroom $classroom
     */
    public function removeClassroom(\AppBundle\Entity\Classroom $classroom)
    {
        $this->classroom->removeElement($classroom);
    }

    /**
     * Get classroom
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClassroom()
    {
        return $this->classroom;
    }
    
    function setClassroom($classroom) {
        
        $this->classroom = $classroom;
        
        return $this;
    }

    


    /**
     * Add attendance
     *
     * @param \AppBundle\Entity\Attendance $attendance
     *
     * @return Subject
     */
    public function addAttendance(\AppBundle\Entity\Attendance $attendance)
    {
        $this->attendance[] = $attendance;

        return $this;
    }

    /**
     * Remove attendance
     *
     * @param \AppBundle\Entity\Attendance $attendance
     */
    public function removeAttendance(\AppBundle\Entity\Attendance $attendance)
    {
        $this->attendance->removeElement($attendance);
    }

    /**
     * Get attendance
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAttendance()
    {
        return $this->attendance;
    }
}
