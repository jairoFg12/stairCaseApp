<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Models\Persona;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Usuario extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Array
     * @ORM\OneToMany(targetEntity="AmistadUsuario", mappedBy="usuario")
     */
    private $amistad;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add amistad
     *
     * @param \AppBundle\Entity\AmistadUsuario $amistad
     *
     * @return Usuario
     */
    public function addAmistad(\AppBundle\Entity\AmistadUsuario $amistad)
    {
        $this->amistad[] = $amistad;

        return $this;
    }

    /**
     * Remove amistad
     *
     * @param \AppBundle\Entity\AmistadUsuario $amistad
     */
    public function removeAmistad(\AppBundle\Entity\AmistadUsuario $amistad)
    {
        $this->amistad->removeElement($amistad);
    }

    /**
     * Get amistad
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAmistad()
    {
        return $this->amistad;
    }
}
