<?php include '../layout/header.php'; ?>

<div class="container">
    <h1>Box Details</h1>

    <?php if ($box): ?>
        <table>
            <tr>
                <th>ID</th>
                <td><?php echo htmlspecialchars($box['id']); ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo htmlspecialchars($box['name']); ?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?php echo htmlspecialchars($box['description']); ?></td>
            </tr>
        </table>

        <a href="/boxes/edit/<?php echo $box['id']; ?>">Edit</a>
        <form action="/boxes/delete/<?php echo $box['id']; ?>" method="POST" style="display:inline;">
            <button type="submit" onclick="return confirm('Are you sure you want to delete this box?');">Delete</button>
        </form>
    <?php else: ?>
        <p>Box not found.</p>
    <?php endif; ?>
</div>

<?php include '../layout/footer.php'; ?>