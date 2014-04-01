<?php

namespace Pilot\NewslineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Author
 *
 * @ORM\Table(name="author", uniqueConstraints={@ORM\UniqueConstraint(name="login_UNIQUE", columns={"login"})})
 * @ORM\Entity
 */
class Author {
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
     * @ORM\Column(name="name", type="string", length=30, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=30, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=30, nullable=false)
     */
    private $login;

    /**
     * @ORM\OneToMany(targetEntity="NewsAuthor", mappedBy="author", cascade={"all"})
     */
    private $news_author;

    private $news;

    public function __construct() {
        $this->news_author = new ArrayCollection();
        $this->news = new ArrayCollection();
    }

    public function getNews() {
        $news = new ArrayCollection();

        foreach($this->news_author as $item) {
            $news[] = $item->getNews();

        }

        return $news;
    }

    public function setNews($news) {
        foreach($news as $item) {
            $news_author = new NewsAuthor();
            $news_author->setNews($item);
            $news_author->setAuthor($this);

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
     * Set name
     *
     * @param string $name
     * @return Author
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return Author
     */
    public function setSurname($surname) {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname() {
        return $this->surname;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return Author
     */
    public function setLogin($login) {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin() {
        return $this->login;
    }
}
