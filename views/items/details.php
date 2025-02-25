<?php include '../views/layout/header.php'; ?>

<div class="container">
    <h1>Item Details</h1>

    <?php if ($item): ?>
        <table>
            <tr>
                <th>ID</th>
                <td><?php echo htmlspecialchars($item['id']); ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?php echo htmlspecialchars($item['description']); ?></td>
            </tr>
            <tr>
                <th>Box ID</th>
                <td><?php echo htmlspecialchars($item['box_id']); ?></td>
            </tr>
        </table>

        <a href="/items/edit.php?id=<?php echo $item['id']; ?>">Edit</a>
        <form action="/items/delete.php" method="POST" style="display:inline;">
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
            <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
        </form>
    <?php else: ?>
        <p>Item not found.</p>
    <?php endif; ?>
</div>

<?php include '../views/layout/footer.php'; ?>