
<h3>Category</h3>
<select name="category_id">
    <?php if (is_array($categoriesList)): ?>
    <?php foreach ($categoriesList as $category): ?>
        <option value="<?php echo $category['id_category']; ?>">
            <?php echo $category['name']; ?>
        </option>
    <?php endforeach; ?>
<?php endif; ?>
</select>

<div class="category">
    <ul class="category">
        <li class="active"><a href="#">ALL</a></li>
        <li><a href="#">PHP</a></li>
        <li><a href="#">Java</a></li>
        <li><a href="#">C#</a></li>
        <li><a href="#">JSE</a></li>
        <li><a href="#">Python</a></li>
    </ul>
    ?>