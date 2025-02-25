<?php include '../views/layout/header.php'; ?>

<div class="container">
    <h1>Box List</h1>

    <a href="/boxes/create">Create New Box</a>

    <?php if ($boxes): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($boxes as $box): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($box['id']); ?></td>
                        <td><?php echo htmlspecialchars($box['name']); ?></td>
                        <td><?php echo htmlspecialchars($box['description']); ?></td>
                        <td>
                            <a href="/boxes/<?php echo $box['id']; ?>">View</a>
                            <a href="/boxes/edit/<?php echo $box['id']; ?>">Edit</a>
                            <form action="/boxes/delete/<?php echo $box['id']; ?>" method="POST" style="display:inline;">
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this box?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No boxes found.</p>
    <?php endif; ?>
</div>

<?php include '../views/layout/footer.php'; ?>