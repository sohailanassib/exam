<?php

use Intervention\Image\ImageManager;

class Product
{
    private $db;
    private $table = 'products'; // Table name

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    // Create a new product
    public function create($name, $description, $price, $image)
    {
        if ($image['image']['size'] > 0) {
            $manager = new ImageManager(
                new Intervention\Image\Drivers\Gd\Driver()
            );

            $imageFile = $image['image']['tmp_name'];
            $img = $manager->read($imageFile);
            $upload = $img->save('images/' . $image['image']['name']);

        }

        $sql = "INSERT INTO " . $this->table . " (name, description, price, image) VALUES (:name, :description, :price, :upload)";

        return $this->db->query($sql, [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'upload' => $image['image']['size'] > 0 ? 'images/' . $image['image']['name'] : 'images/default.jpg',
        ]);
    }

    // Get a product by ID
    public function getById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";
        return $this->db->fetch($sql, ['id' => $id]);
    }

    // Get all products
    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        return $this->db->fetchAll($sql);
    }

    // Update a product by ID
    public function update($id, $name, $description, $price, $image)
    {
        if ($image['image']['size'] > 0) {
            $manager = new ImageManager(
                new Intervention\Image\Drivers\Gd\Driver()
            );

            $imageFile = $image['image']['tmp_name'];
            $img = $manager->read($imageFile);
            $upload = $img->save('images/' . $image['image']['name']);

        }

        $product = $this->getById($id);

        $sql = "UPDATE " . $this->table . " SET name = :name, description = :description, price = :price, image = :upload WHERE id = :id";

        return $this->db->query($sql, [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'upload' => $image['image']['size'] > 0 ? 'images/' . $image['image']['name'] : $product['image'],
            'id' => $id,
        ]);
    }

    // Delete a product by ID
    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        return $this->db->query($sql, ['id' => $id]);
    }
}
