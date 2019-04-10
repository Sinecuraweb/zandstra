<?php

namespace App\Object\Entity\Shop;

use PDO;
use App\Object\Entity\IdentityObject;
use App\Object\Entity\IdentityTrait;
use App\Object\Entity\PriceUtilities;

class ShopProduct implements IdentityObject
{
    use IdentityTrait, PriceUtilities;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $producerFirstName;

    /**
     * @var string
     */
    private $producerMainName;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var float
     */
    private $discount = 0;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price
    ) {
        $this->title = $title;
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
        $this->price = $price;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function toTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function toProducer(): string
    {
        return sprintf('%s %s',
            $this->producerFirstName,
            $this->producerMainName);
    }

    /**
     * @return string
     */
    public function toSummaryLine(): string
    {
        return sprintf('%s (%s, %s)',
            $this->title,
            $this->producerMainName,
            $this->producerFirstName);
    }

    /**
     * @return float
     */
    public function toPrice(): float
    {
        return $this->price - $this->discount;
    }

    /**
     * @return float
     */
    public function toDiscount(): float
    {
        return $this->discount;
    }

    /**
     * @param float $discount
     */
    public function applyDiscount(float $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return int
     */
    public function toTaxRate(): int
    {
        return 17;
    }

    /**
     * @param int $id
     * @param PDO $pdo
     * @return ShopProduct
     * @throws \RuntimeException
     */
    public static function createInstance(int $id, PDO $pdo): self
    {
        $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        if (empty($row)) {
            throw new \RuntimeException(
                sprintf('Продукт с ID %d не найден.', $id)
            );
        }

        if ('book' === $row['type']) {
            $product = new BookProduct(
                $row['title'],
                $row['first_name'],
                $row['main_name'],
                $row['price'],
                $row['num_pages']
            );
        } elseif ('cd' === $row['type']) {
            $product = new CDProduct(
                $row['title'],
                $row['first_name'],
                $row['main_name'],
                $row['price'],
                $row['play_length']
            );
        } else {
            $product = new ShopProduct(
                $row['title'],
                $row['first_name'],
                $row['main_name'],
                $row['price']
            );
        }

        $product->setId($row['id']);

        if (null !== $row['discount']) {
            $product->applyDiscount($row['discount']);
        }

        return $product;
    }
}
