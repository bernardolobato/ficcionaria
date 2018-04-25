<?php
namespace Model;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="profiles")
 **/
class Profile {
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    public $id;

   /** @ORM\Column(type="string") **/
   public $name;

    /** @ORM\Column(type="string", nullable=true) **/
    public $photoUrl;

   /** @ORM\Column(type="string") **/
   public $bio;
    
    /** @ORM\Column(type="string") **/
    public $tags;
 
    /** @ORM\Column(type="string") **/
    public $status;
    
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


    public static function fromArray($args) {
        $profile = new Profile();
        $profile->id =  isset($args['id']) ? $args['id'] : null;
        $profile->name = isset($args['name']) ? $args['name'] : null;
        $profile->bio = isset($args['bio']) ? $args['bio'] : null;
        $profile->tags = isset($args['tags']) ? $args['tags'] : null;
        $profile->status = isset($args['status']) ? $args['status'] : null;
        $profile->created = new \DateTime();
        $profile->modified = new \DateTime();

        return $profile;
    }
}