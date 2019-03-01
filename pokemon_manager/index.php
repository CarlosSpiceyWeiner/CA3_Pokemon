<?php
require('../model/database.php');
require('../model/pokemon_db.php');
require('../model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_pokemon';
    }
}

if ($action == 'list_pokemon') {
    // Get the current category ID
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    
    // Get pokemon and category data
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $pokemon = get_pokemon_by_category($category_id);

    // Display the pokemon list
    include('pokemon_list.php');
} else if ($action == 'show_edit_form') {
    $pokemon_id = filter_input(INPUT_POST, 'pokemon_id', 
            FILTER_VALIDATE_INT);
    if ($pokemon_id == NULL || $pokemon_id == FALSE) {
        $error = "Missing or incorrect pokemon id.";
        include('../errors/error.php');
    } else { 
        $pokemon = get_pokemon($pokemon_id);
        include('pokemon_edit.php');
    }
} else if ($action == 'update_pokemon') {
    $pokemon_id = filter_input(INPUT_POST, 'pokemon_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $moves = filter_input(INPUT_POST, 'moves');
    $name = filter_input(INPUT_POST, 'name');
    $level = filter_input(INPUT_POST, 'level', FILTER_VALIDATE_FLOAT);

    // Validate the inputs
    if ($pokemon_id == NULL || $pokemon_id == FALSE || $category_id == NULL || 
            $category_id == FALSE || $moves == NULL || $name == NULL || 
            $level == NULL || $level == FALSE) {
        $error = "Invalid pokemon data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        update_pokemon($pokemon_id, $category_id, $moves, $name, $level);

        // Display the pokemon List page for the current category
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'delete_pokemon') {
    $pokemon_id = filter_input(INPUT_POST, 'pokemon_id', 
            FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE ||
            $pokemon_id == NULL || $pokemon_id == FALSE) {
        $error = "Missing or incorrect pokemon id or category id.";
        include('../errors/error.php');
    } else { 
        delete_pokemon($pokemon_id);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'show_add_form') {
    $categories = get_categories();
    include('pokemon_add.php');
} else if ($action == 'add_pokemon') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $moves = filter_input(INPUT_POST, 'moves');
    $name = filter_input(INPUT_POST, 'name');
    $level = filter_input(INPUT_POST, 'level', FILTER_VALIDATE_FLOAT);
    if ($category_id == NULL || $category_id == FALSE || $moves == NULL || 
            $name == NULL || $level == NULL || $level == FALSE) {
        $error = "Invalid pokemon data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_pokemon($category_id, $moves, $name, $level);
        header("Location: .?category_id=$category_id");
    }
} else if ($action == 'list_categories') {
    $categories = get_categories();
    include('category_list.php');
} else if ($action == 'add_category') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) {
        $error = "Invalid category name. Check name and try again.";
        include('../errors/error.php');
    } else {
        add_category($name);
        header('Location: .?action=list_categories');  // display the Category List page
    }
} else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    delete_category($category_id);
    header('Location: .?action=list_categories');      // display the Category List page
}
?>