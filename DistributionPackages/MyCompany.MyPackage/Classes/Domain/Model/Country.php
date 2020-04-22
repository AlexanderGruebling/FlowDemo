<?php
namespace MyCompany\MyPackage\Domain\Model;

/*
 * This file is part of the MyCompany.MyPackage package.
 */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

/**
 * @Flow\Entity
 */
class Country
{

    /**
     * @Flow\Validate(type="NotEmpty")
     * @Flow\Validate(type="StringLength", options={ "minimum"=3, "maximum"=80 })
     * @ORM\Column(length=80)
     * @var string
     */
    protected $name;

    /**
     * The posts contained in this blog
     *
     * @ORM\OneToMany(mappedBy="country")
     * @ORM\OrderBy({"date" = "DESC"})
     * @var Collection<Dancer>
     */
    protected $dancers;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Collection
     */
    public function getDancers()
    {
        return $this->dancers;
    }

    /**
     * @param Collection $dancers
     */
    public function setDancers($dancers)
    {
        $this->dancers = $dancers;
    }

}
