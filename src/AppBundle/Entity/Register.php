<?php 
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class Register
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
    * @ORM\Column(type="string", length=100)
    * @Assert\NotBlank()
    */
    protected $firstName;

    /**
    * @ORM\Column(type="string", length=100)
    * @Assert\NotBlank()
    */    
    protected $lastName;

    /**
    * @Assert\Email(
    *   message = "The email '{{ value }}' is not a valid email.",
    *   checkMX = true
    * )
    * @Assert\Length(
    *   max = 255              
    * )
    * @Assert\NotBlank()
    *
    * @ORM\Column(type="string")
    */    
    protected $email;

    /**
    * @Assert\Length(
    *   min = 5,    
    *   max = 255,
    *   minMessage = "Your password must be at least {{ limit }} characters long",
    *   maxMessage = "Your password cannot be longer than {{ limit }} characters"                
    * )
    * @Assert\NotBlank()
    * @ORM\Column(type="string")
    */     
    protected $password;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }        

}
