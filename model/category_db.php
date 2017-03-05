<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories_guitar_shop1
              ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}

function get_category_name($category_id) {
    global $db;
    $query = 'SELECT * FROM categories_guitar_shop1
              WHERE categoryID = :category_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();    
    $category = $statement->fetch();
    $statement->closeCursor();    
    $category_name = $category['categoryName'];
    return $category_name;
}

function delete_category_name($category_id){
    global $db;
    $query = 'DELETE FROM categories_guitar_shop1
              WHERE categoryID = :category_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

function add_category_name($category_id, $category_name){
    global $db;
    $query = 'INSERT INTO categories_guitar_shop1
                 (categoryID, categoryName)
              VALUES
                 (:categoryId, :category)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category', $category);
    $statement->bindValue(':categoryId', $categoryId);
    $statement->execute();
    $statement->closeCursor();
}
?>
