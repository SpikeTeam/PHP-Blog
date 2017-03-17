<?php
/**
 * Created by PhpStorm.
 * User: d1Av0
 * Date: 17-Mar-17
 * Time: 12:24 PM
 */

namespace Service\Category;


interface ICategoryService
{
    public static function getCategoryList($categoryList,$result,$row,$i);

    public function getCategoriesListAdmin($db,$result,$categoryList,$i);


}