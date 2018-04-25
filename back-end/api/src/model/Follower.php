<?php
namespace Model;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity @ORM\Table(name="followers")
 **/
class Follower {
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    public $id;

      /**
     * @ORM\ManyToOne(targetEntity="Profile", fetch="EAGER")
     * @ORM\JoinColumn(name="follower_id", referencedColumnName="id")
     */
    public $follower;
     /**
     * @ORM\ManyToOne(targetEntity="Profile", fetch="EAGER")
     * @ORM\JoinColumn(name="followed_id", referencedColumnName="id")
     */
    public $followed;
    
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
        $entity = new Follower();
        $entity->id =  isset($args['id']) ? $args['id'] : null;
        $follower = new Profile();
        $follower->id = $args['follower']['id'];
        $entity->follower = $follower;

        $followed = new Profile();
        $followed->id = $args['followed']['id'];
        $entity->followed = $followed;

        $entity->status = $args['status'];
        $entity->created = new \DateTime();
        $entity->modified = new \DateTime();

        return $entity;
    }

    public function ToArray() {
    }
}