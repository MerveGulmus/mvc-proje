<?php


class ProductModel extends Model
{
    public function getAll()
    {
        $products = $this->db->query('select * from product ORDER BY "id" DESC')->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    public function insertProduct($data)
    {
        foreach ($data as $item) {
            $insert = $this->db->prepare('insert into product(id,name,price,category) values (:id, :name,:price,:category)');
            $insert->execute([
                ":id" => null,
                ":name" => $item->name,
                ":price" => $item->price,
                ":category" => $item->category,
            ]);
        }
    }
}