<?php
include 'inc/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
} else {
    header('location: ' . ROOT_URL . 'admin/manage_users.php');
    die();
}
?>
<!-- edit-user page -->
<section class="form_section">
    <div class="container form_section_container">
        <h2>Edit User</h2>
        <form action="<?= ROOT_URL ?>admin/edit-user-logic.php" method="POST">
            <input type="hidden" value="<?= $user['id'] ?>" name="id">
            <input type="text" value="<?= $user['first_name'] ?>" name="first_name" placeholder="First Name">
            <input type="text" value="<?= $user['last_name'] ?>" name="last_name" placeholder="Last Name">
            <select name="user_role">
                <option value="0">Author</option>
                <option value="1">Admin</option>
            </select>
            <button type="submit" name="submit" class="btn">Update User</button>
        </form>
    </div>
</section>
<?php
include '../inc/footer.php';
?>