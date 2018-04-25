<?php
namespace Model;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="comments")
 **/
class Comment {
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    public $id;

   /** @ORM\Column(type="string") **/
   public $text;
 
    /** @ORM\Column(type="string") **/
    public $status;

     /**
     * @ORM\ManyToOne(targetEntity="Post", fetch="EAGER")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     */
    public $post;

    /**
     * @ORM\ManyToOne(targetEntity="Profile", fetch="EAGER")
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     */
    public $profile;
    
     /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    public $created;

   /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    public $modified;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of text
     */ 
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of post
     */ 
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set the value of post
     *
     * @return  self
     */ 
    public function setPost($post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get the value of created
     *
     * @return  DateTime
     */ 
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set the value of created
     *
     * @param  DateTime  $created
     *
     * @return  self
     */ 
    public function setCreated(DateTime $created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get the value of modified
     *
     * @return  DateTime
     */ 
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set the value of modified
     *
     * @param  DateTime  $modified
     *
     * @return  self
     */ 
    public function setModified(DateTime $modified)
    {
        $this->modified = $modified;

        return $this;
    }




    public static function fromArray($args) {
        $entity = new Comment();
        $entity->id =  isset($args['id']) ? $args['id'] : null;
        $entity->text = $args['text'];
        $entity->status = $args['status'];
        $entity->created = new \DateTime();
        $entity->modified = new \DateTime();
        $entity->modified = new \DateTime();
        $post =  new Post();
        $post->id = $args['post']['id'];
        $entity->post = $post;

        $profile =  new Profile();
        $profile->id = $args['profile']['id'];
        $entity->profile = $profile;

        return $entity;
    }

    public function ToArray() {
        $entity = array();
        $entity['id'] = $this->id;
        $entity['text'] =$this->text;
        $entity['status'] = $this->status;
        $entity['created'] = $this->created;
        $entity['modified'] = $this->modified;
        $entity['postedAt'] = $this->postedAt;

        return $entity;
    }
}