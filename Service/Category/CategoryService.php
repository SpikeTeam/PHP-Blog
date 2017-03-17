<?php
namespace Service\Category;
use Adapter\IDataBase;

/**
 * Created by PhpStorm.
 * User: d1Av0
 * Date: 17-Mar-17
 * Time: 12:19 PM
 */
namespace Service\Category;
class CategoryService implements ICategoryService
{
    private $db;

    public function __construct(IDataBase $db)

    {
        $this->db = $db;
    }
    public static function getCategoryList($categoryList,$result,$row,$i)
    {
        $db = Db::getConnection();
        $categotyList = array();
        $result = $db->query('SELECT `id_category`, `name` FROM `category`');
        $i = 0;
        while ($row = $result->fetch()) {
            $categotyList[$i]['id_category'] = $row ['id_category'];
            $categotyList[$i]['name'] = $row ['name'];
            $i++;
        }
        return $categotyList;
    }

    public function getCategoriesListAdmin($db,$result,$categoryList,$i)
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT `id`, `name`,`id_category`
							FROM `category`');
        $categotyList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $categotyList[$i]['id'] = $row['id'];
            $categotyList[$i]['name'] = $row['name'];
            $categotyList[$i]['id_category'] = $row['id_category'];
            $i++;
        }
        return $categotyList;
    }
}

