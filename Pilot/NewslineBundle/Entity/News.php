<?php

namespace Pilot\NewslineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity
 */
class News {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_date", type="datetime", nullable=true)
     */
    private $createdDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_date", type="datetime", nullable=true)
     */
    private $updatedDate;

    /**
     * @ORM\OneToMany(targetEntity="NewsAuthor", mappedBy="news", cascade={"all"})
     */
    private $news_author;

    private $authors;

    public function __construct() {
        $this->news_author = new ArrayCollection();
        $this->authors = new ArrayCollection();
    }

    public function getAuthors() {
        $authors = new ArrayCollection();

        foreach($this->news_author as $author) {
            $authors[] = $author->getAuthor();

        }

        return $authors;
    }

    public function setAuthors($authors) {
        foreach($authors as $author) {
            $news_author = new NewsAuthor();
            $news_author->setNews($this);
            $news_author->setAuthor($author);

            $this->addNewsAuthor($news_author);
        }
    }

    public function addNewsAuthor($NewsAuthor) {
        $this->news_author[] = $NewsAuthor;
    }

    public function removeNewsAuthor($NewsAuthor) {
        $this->news_author->removeElement($NewsAuthor);
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return News
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return News
     */
    public function setContent($content) {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return News
     */
    public function setCreatedDate($createdDate) {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime
     */
    public function getCreatedDate() {
        return $this->createdDate;
    }

    /**
     * Set updatedDate
     *
     * @param \DateTime $updatedDate
     * @return News
     */
    public function setUpdatedDate($updatedDate) {
        $this->updatedDate = $updatedDate;

        return $this;
    }

    /**
     * Get updatedDate
     *
     * @return \DateTime
     */
    public function getUpdatedDate() {
        return $this->updatedDate;
    }
}
