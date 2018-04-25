<?php
namespace Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="posts")
 **/
class Post
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    public $id;

    /** @ORM\Column(type="string") **/
    public $title;

    /** @ORM\Column(type="text") **/
    public $text;

    /** @ORM\Column(type="string") **/
    public $status;


    /**
     * @ORM\ManyToOne(targetEntity="Profile", fetch="EAGER")
     * @ORM\JoinColumn(name="profile_id", referencedColumnName="id")
     */
    public $profile;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $postedAt;
    
    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $created;

    /**
     * @ORM\Column(type="datetime")
     * @var DateTime
     */
    private $modified;

    public static function fromArray($args) {
        $post = new Post();
        $post->id =  isset($args['id']) ? $args['id'] : null;
        $post->title = $args['title'];
        $post->text = $args['text'];
        $post->status = $args['status'];
        $post->created = new \DateTime();
        $post->modified = new \DateTime();
        $post->postedAt = new \DateTime();
        $profile =  Profile::fromArray($args['profile']);

        $post->profile = new Profile();
        $post->profile->id = $profile->id;

        return $post;
    }

    public function ToArray() {
        $post = array();
        $post['id'] = $this->id;
        $post['title'] = $this->title;
        $post['text'] =$this->text;
        $post['status'] = $this->status;
        $post['created'] = $this->created;
        $post['modified'] = $this->modified;
        $post['postedAt'] = $this->postedAt;

        return $post;
    }
}