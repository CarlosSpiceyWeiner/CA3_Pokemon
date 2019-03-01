<?php
function get_pokemons() {
    global $db;
    $query = 'SELECT * FROM pokemon
              ORDER BY pokemonID';
    $statement = $db->prepare($query);
    $statement->execute();
    $pokemon = $statement->fetchAll();
    $statement->closeCursor();
    return $pokemon;
}

function get_pokemon_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM pokemon
              WHERE pokemon.categoryID = :category_id
              ORDER BY pokemonID';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $pokemon = $statement->fetchAll();
    $statement->closeCursor();
    return $pokemon;
}

function get_pokemon($pokemon_id) {
    global $db;
    $query = 'SELECT * FROM pokemon
              WHERE pokemonID = :pokemon_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":pokemon_id", $pokemon_id);
    $statement->execute();
    $pokemon = $statement->fetch();
    $statement->closeCursor();
    return $pokemon;
}

function delete_pokemon($pokemon_id) {
    global $db;
    $query = 'DELETE FROM pokemon
              WHERE pokemonID = :pokemon_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':pokemon_id', $pokemon_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_pokemon($category_id, $moves, $name, $level) {
    global $db;
    $query = 'INSERT INTO pokemon
                 (categoryID, pokemonMoves, pokemonName, level)
              VALUES
                 (:category_id, :moves, :name, :level)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':moves', $moves);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':level', $level);
    $statement->execute();
    $statement->closeCursor();
}

function update_pokemon($pokemon_id, $category_id, $moves, $name, $level) {
    global $db;
    $query = 'UPDATE pokemon
              SET categoryID = :category_id,
                  pokemonMoves = :moves,
                  pokemonName = :name,
                  level = :level
               WHERE pokemonID = :pokemon_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':moves', $moves);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':level', $level);
    $statement->bindValue(':pokemon_id', $pokemon_id);
    $statement->execute();
    $statement->closeCursor();
}
?>