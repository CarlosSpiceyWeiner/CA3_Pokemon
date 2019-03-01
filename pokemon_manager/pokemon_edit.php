<?php include '../view/header.php'; ?>
<main>
    <h1>Edit pokemon</h1>
    <form action="index.php" method="post" id="add_pokemon_form">

        <input type="hidden" name="action" value="update_pokemon">

        <input type="hidden" name="pokemon_id"
               value="<?php echo $pokemon['pokemonID']; ?>">

        <label>Category ID:</label>
        <input type="category_id" name="category_id"
               value="<?php echo $pokemon['categoryID']; ?>">
        <br>

        <label>Moves:</label>
        <input type="input" name="moves"
               value="<?php echo $pokemon['pokemonMoves']; ?>">
        <br>

        <label>Name:</label>
        <input type="input" name="name"
               value="<?php echo $pokemon['pokemonName']; ?>">
        <br>

        <label>Level:</label>
        <input type="input" name="level"
               value="<?php echo $pokemon['level']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_pokemon">View pokemon List</a></p>

</main>
<?php include '../view/footer.php'; ?>