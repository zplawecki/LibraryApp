<?php

namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Author
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Author
{
    /**
     * @ORM\ManyToMany(targetEntity="Book", inversedBy="authors")
     * @ORM\JoinTable(name="authors_books")
     */
    private $books;
    
    public function __construct() {
        $this->books = new ArrayCollection();
    }


    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="author_id", type="integer")
     */
    private $authorId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


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
     * Set authorId
     *
     * @param integer $authorId
     * @return Author
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;

        return $this;
    }

    /**
     * Get authorId
     *
     * @return integer 
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Author
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add books
     *
     * @param \MyBundle\Entity\Book $books
     * @return Author
     */
    public function addBook(\MyBundle\Entity\Book $books)
    {
        $this->books[] = $books;

        return $this;
    }

    /**
     * Remove books
     *
     * @param \MyBundle\Entity\Book $books
     */
    public function removeBook(\MyBundle\Entity\Book $books)
    {
        $this->books->removeElement($books);
    }

    /**
     * Get books
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBooks()
    {
        return $this->books;
    }
}
