
<?php
require_once("app.php");
$categoryService = new \Service\Category\CategoryService($db);

$data = $categoryService->getCategoriesListAdmin($_GET['id_category']);

$app->loadTemplate("category_frontend",$data);

?>




