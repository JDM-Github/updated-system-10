<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Bulletin Board</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .anchor {
            position: fixed;
            left: 20px;
            top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            z-index: 1000;
        }

        .anchor:hover {
            background-color: #218838;
        }
    </style> 
</head>
<body>
    <a href="index.php" class="anchor">Back</a>
    <div class="container mt-4">
        <h2 class="text-center">Admin Bulletin Board Management</h2>
        <div class="card shadow-sm mt-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Manage Bulletin Board</h5>
            </div>
            <div class="card-body">
                <ul class="list-group" id="bulletinList">
                    <!-- Bulletin items will be added here -->
                </ul>
                <button class="btn btn-success mt-3" data-toggle="modal" data-target="#addModal">Add Item</button>
            </div>
        </div>
    </div>

    <!-- Modal for Adding/Editing Bulletin Item -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add/Edit Bulletin Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editIndex">
                    <div class="form-group">
                        <label for="bulletinContent">Bulletin Content</label>
                        <input type="text" class="form-control" id="bulletinContent" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveButton">Save</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let editMode = false;
        let currentIndex;

        // Function to load bulletins from localStorage
        function loadBulletins() {
            const list = document.getElementById('bulletinList');
            list.innerHTML = ''; // Clear existing list
            const bulletins = JSON.parse(localStorage.getItem('bulletins')) || [];
            bulletins.forEach((content, index) => {
                const newItem = document.createElement('li');
                newItem.className = 'list-group-item';
                newItem.innerHTML = `<strong>${content}</strong>
                    <button class="btn btn-danger btn-sm float-right" onclick="deleteItem(this)">Delete</button>
                    <button class="btn btn-primary btn-sm float-right mr-2" onclick="editItem(this, ${index})">Edit</button>`;
                list.appendChild(newItem);
            });
        }

        // Function to add or edit a bulletin item
        function saveBulletin() {
            const content = document.getElementById('bulletinContent').value;
            const bulletins = JSON.parse(localStorage.getItem('bulletins')) || [];

            if (editMode) {
                // Update existing item
                bulletins[currentIndex] = content;
            } else {
                // Add new item
                bulletins.push(content);
            }

            localStorage.setItem('bulletins', JSON.stringify(bulletins)); // Save to localStorage
            loadBulletins(); // Refresh list
            $('#addModal').modal('hide');
            document.getElementById('bulletinContent').value = ''; // Clear input
            editMode = false;
        }

        // Function to delete a bulletin item
        function deleteItem(button) {
            const index = Array.from(button.parentElement.parentNode.children).indexOf(button.parentElement);
            const bulletins = JSON.parse(localStorage.getItem('bulletins')) || [];
            bulletins.splice(index, 1); // Remove the bulletin
            localStorage.setItem('bulletins', JSON.stringify(bulletins)); // Update localStorage
            loadBulletins(); // Refresh list
        }

        // Function to edit a bulletin item
        function editItem(button, index) {
            const bulletins = JSON.parse(localStorage.getItem('bulletins')) || [];
            document.getElementById('bulletinContent').value = bulletins[index];
            currentIndex = index;
            editMode = true;
            $('#addModal').modal('show');
        }

        // Event listener for the save button
        document.getElementById('saveButton').addEventListener('click', saveBulletin);

        // Load bulletins on page load
        window.onload = loadBulletins;
    </script>
</body>
</html>
