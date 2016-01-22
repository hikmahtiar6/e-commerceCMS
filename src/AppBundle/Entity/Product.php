<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;

/**
 * @ORM\Entity
 * @ORM\Table(name="product", indexes={@Index(name="product_index", columns={"name", "price"})})
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * @ORM\Column(type="string", length=150)
     */
    protected $name;

    /**
     * @ORM\Column(type="integer", length=20)
     */
    protected $price;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    public function getId()
    {
        return $this->id;
    }

    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }
}
?>