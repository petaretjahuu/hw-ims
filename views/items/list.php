<?php include '../views/layout/header.php'; ?>

<div class="container">
    <h1>Item List</h1>

    <a href="/items/create.php">Create New Item</a>

    <?php if ($items): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Box ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['id']); ?></td>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td><?php echo htmlspecialchars($item['description']); ?></td>
                        <td><?php echo htmlspecialchars($item['box_id']); ?></td>
                        <td>
                            <a href="/items/details.php?id=<?php echo $item['id']; ?>">View</a>
                            <a href="/items/edit.php?id=<?php echo $item['id']; ?>">Edit</a>
                            <form action="/items/delete.php" method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No items found.</p>
    <?php endif; ?>
</div>

<?php include '../views/layout/footer.php'; ?>