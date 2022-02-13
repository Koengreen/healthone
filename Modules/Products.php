<?php

function getProducts(int $category_id)
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM product WHERE category_id = ? ');
    $sth->bindParam(1, $category_id);
    $sth->execute();
    $products = $sth->fetchAll(PDO::FETCH_CLASS, 'Product');
    return $products;
}

function getProduct(int $productId)
{
    global $pdo;
    $sth = $pdo->prepare('SELECT * FROM product WHERE id = ?');
    $sth->bindParam(1, $productId);
    $sth->execute();
    $product = $sth->fetchAll(PDO::FETCH_CLASS, 'Product')[0];
    return $product;
}
