<?php

namespace Makiblog\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="entry")
 */
class Entry {
	/**
	 * @ORM\Id @ORM\GeneratedValue 
	 * @ORM\Column(type="integer", name="id_entry")
	 */
	protected $idEntry;

	/**
	 * @ORM\Column(type="integer", name="id_user")
	 */
	protected $idUser;

	/**
	 * @ORM\Column(type="string")
	 */
	private $title;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $slug;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $text;

	/**
	 * @ORM\Column(type="datetime", name="posted_at")
	 */
	protected $postedAt;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $status;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected $deleted;

	
	

	public function getIdEntry() {
	    return $this->idEntry;
	}
	
	public function setIdEntry($idEntry) {
	    $this->idEntry = $idEntry;
	
	    return $this;
	}
	public function getTitle() {
	    return $this->title;
	}
	
	public function setTitle($title) {
	    $this->title = $title;
	
	    return $this;
	}

	public function getText() {
	    return $this->text;
	}
	
	public function setText($text) {
	    $this->text = $text;
	
	    return $this;
	}

	public function getSlug() {
	    return $this->slug;
	}

	public function setSlug($slug) {
	    $this->slag = $slug;
	
	    return $this;
	}
	
	public function getPostedAt() {
	    return $this->postedAt;
	}
	
	public function setPostedAt($postedAt) {
	    $this->postedAt = $postedAt;
	
	    return $this;
	}

}
