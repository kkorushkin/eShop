<?php
class Store{
    private $_link;
    private $_setVars;
    const DB_HOST = "127.0.0.1";
    const DB_NAME = "eStore";
    const DB_USER = "root";
    const DB_PASS = "";
    public function __construct(){
        $this->_link = new mysqli(self::DB_HOST,self::DB_USER,self::DB_PASS,self::DB_NAME);
    }
    public function __set($name, $value){
        $this->_setVars[$name] = $value;
    }
    public function __get($name){
        $this->_setVars[$name];
    }
    public function getCollection($items_category, $items_sub_category){
        $items_sub_category = $this->itemsSubCat($items_sub_category);
        $query = "SELECT i.items_id,i.items_name,i.items_description,i.items_price,i.items_margin,i.items_originlink,img.link
			FROM items i
			INNER JOIN images img
			ON i.items_id = img.item_id
			WHERE i.items_category = $items_category $items_sub_category
			GROUP BY i.items_price;";
        $result = $this->_link->query($query);
        return $this->fetchResult($result);

    }
    public function getSearchResult($search){
        $query = "SELECT i.items_id,i.items_name,i.items_description,i.items_price,i.items_margin,img.link
			FROM items i
			INNER JOIN images img
			ON i.items_id = img.item_id
			WHERE i.items_name LIKE \"%$search%\"
			GROUP BY i.items_id;";
        $result = $this->_link->query($query);
        return $this->fetchResult($result);
    }
    public function getAllItemImages($item_id){
        $query = "SELECT img.link FROM images img WHERE img.item_id = $item_id;";
        $result = $this->_link->query($query);
        return $this->fetchResult($result);
    }
    public function getSingleItem($item_id){
        $item_id = (int)$item_id;
        $query = "SELECT i.items_id,i.items_name,i.items_description,i.items_price,i.items_margin,img.link
		FROM items i
		INNER JOIN images img
		ON i.items_id = img.item_id
		WHERE i.items_id = $item_id;";
        $result = $this->_link->query($query);
        return $this->fetchResult($result);
    }
    protected function fetchResult($data){
        $collection = array();
        while($row = $data->fetch_assoc()){
            $collection[] = $row;
        }
        return $collection;
    }
    protected function itemsSubCat($items_sub_category){
        switch ($items_sub_category){
            case 0:
                return $items_sub_category = "";
                break;
            case 3:
                return $items_sub_category = " AND (i.items_sub_category = 1 OR i.items_sub_category = 3)";
                break;
            case 4:
                return $items_sub_category = " AND (i.items_sub_category = 1 OR i.items_sub_category = 4)";
                break;
            case 5:
                return $items_sub_category = " AND (i.items_sub_category = 2 OR i.items_sub_category = 5)";
                break;
        }
    }
    public function __destruct(){
        $this->_link->close();
    }
}
?>