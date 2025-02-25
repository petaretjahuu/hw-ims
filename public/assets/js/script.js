document.addEventListener('DOMContentLoaded', function() {
    // Function to handle form submissions
    function handleFormSubmit(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);
        const action = form.getAttribute('action');
        const method = form.getAttribute('method').toUpperCase();

        fetch(action, {
            method: method,
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Operation successful!');
                // Optionally, you can refresh the page or update the UI
                location.reload();
            } else {
                alert('Operation failed: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
    }

    // Attach event listeners to all forms
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', handleFormSubmit);
    });

    // Function to handle delete buttons
    function handleDeleteButtonClick(event) {
        const button = event.target;
        const itemId = button.getAttribute('data-id');
        const deleteUrl = button.getAttribute('data-url');

        if (confirm('Are you sure you want to delete this item?')) {
            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: itemId }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Item deleted successfully!');
                    // Optionally, you can refresh the page or update the UI
                    location.reload();
                } else {
                    alert('Deletion failed: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        }
    }

    // Attach event listeners to all delete buttons
    const deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach(button => {
        button.addEventListener('click', handleDeleteButtonClick);
    });
});