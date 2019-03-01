<?php include '../view/header.php'; ?>
<main>
    <h1>Add pokemon</h1>
    <form action="index.php" method="post" id="add_pokemon_form">
        <input type="hidden" name="action" value="add_pokemon">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ( $categories as $category ) : ?>
            <option value="<?php echo $category['categoryID']; ?>">
                <?php echo $category['categoryName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Moves:</label>
        <input type="input" name="moves">
        <br>

        <label>Name:</label>
        <input type="input" name="name">
        <br>

        <label>Level:</label>
        
        <input type="input" name="level">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add pokemon">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_pokemon">View pokemon List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>
