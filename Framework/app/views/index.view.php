<?php require 'partials/header.view.php' ?>
    <h1>Submit Your Name</h1>
    <form action="/names" method="post">
        <input type="text" name="username">
        <input type="submit" name="submit" value="submit">
    </form>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($tasks as $task) {
            echo "<tr><td>$task->user_id</td>";
            echo "<td>$task->name</td></tr>";
        }
        ?>
        </tbody>
    </table>

<?php require 'partials/footer.view.php' ?>