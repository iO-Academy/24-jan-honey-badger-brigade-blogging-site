<?php

require_once 'src/Entities/Blog.php';
require_once 'src/Entities/Category.php';

class CategoryModel
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    /**
     * @return Category[];
     */
    public function getAllCategories(): array
    {
        $query = $this->db->prepare('SELECT `id`, `name` FROM `categories`;');
        $query->execute();
        $data = $query->fetchAll();
        return $this->hydrateAllCategories($data);
    }

    public function hydrateSingleCategory(array $data): Category|false
    {
        return new Category($data['id'], $data['name']);
    }
    public function hydrateAllCategories(array $data): array
    {
        $categories = [];
        foreach ($data as $category) {
            $categories[] = $this->hydrateSingleCategory($category);
        }
        return $categories;
    }
}