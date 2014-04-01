<?php

namespace Pilot\NewslineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NewsAuthor
 *
 * @ORM\Table(name="news_author", indexes={@ORM\Index(name="fk_NewsAuthor_1_idx", columns={"news_id"}), @ORM\Index(name="fk_NewsAuthor_2_idx", columns={"author_id"})})
 * @ORM\Entity
 */
class NewsAuthor {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \News
     *
     * @ORM\ManyToOne(targetEntity="News", inversedBy="news")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="news_id", referencedColumnName="id")
     * })
     */
    private $news;

    /**
     * @var \Author
     *
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="author")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     * })
     */
    private $author;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set news
     *
     * @param \Pilot\NewslineBundle\Entity\News $news
     * @return NewsAuthor
     */
    public function setNews(\Pilot\NewslineBundle\Entity\News $news = null) {
        $this->news = $news;

        return $this;
    }

    /**
     * Get news
     *
     * @return \Pilot\NewslineBundle\Entity\News
     */
    public function getNews() {
        return $this->news;
    }

    /**
     * Set author
     *
     * @param \Pilot\NewslineBundle\Entity\Author $author
     * @return NewsAuthor
     */
    public function setAuthor(\Pilot\NewslineBundle\Entity\Author $author = null) {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Pilot\NewslineBundle\Entity\Author
     */
    public function getAuthor() {
        return $this->author;
    }
}
