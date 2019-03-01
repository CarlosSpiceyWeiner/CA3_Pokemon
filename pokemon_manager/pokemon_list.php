<?php include '../view/header.php'; ?>
<main>

    <h1>pokemon List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Categories</h2>
        <?php include '../view/category_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of pokemon -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>moves</th>
                <th>Name</th>
                <th class="right">level</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($pokemon as $pokemon) : ?>
            <tr>
                <td><?php echo $pokemon['pokemonMoves']; ?></td>
                <td><?php echo $pokemon['pokemonName']; ?></td>
                <td class="right"><?php echo $pokemon['level']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="pokemon_id"
                           value="<?php echo $pokemon['pokemonID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $pokemon['categoryID']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_pokemon">
                    <input type="hidden" name="pokemon_id"
                           value="<?php echo $pokemon['pokemonID']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $pokemon['categoryID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add pokemon</a></p>
        <p><a href="?action=list_categories">List Categories</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>