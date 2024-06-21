
<style>
    .modal {
        display: none; 
        position: fixed; 
        z-index: 1; 
        left: 0;
        top: 0;
        width: 100%; 
        height: 100%; 
        overflow: auto; 
        background-color: rgb(0,0,0); 
        background-color: rgba(0,0,0,0.4); 
        padding-top: 60px; 
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto; 
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 300px; 
        border-radius: 10px; 
        box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .modal-header, .modal-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        border-bottom: 1px solid #ddd;
    }

    .modal-header {
        border-bottom: none;
    }

    .modal-title {
        font-size: 18px;
        font-weight: bold;
    }

    .close {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-body {
        padding: 20px 16px;
        font-size: 16px;
        color: #333;
    }

    .modal-footer {
        border-top: 1px solid #ddd;
    }

    .btn {
        padding: 10px 28px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }
</style>

<!-- delete_modal.php -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span class="modal-title">Confirm Deletion</span>
            <span class="close" id="closeModal">&times;</span>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this record?
        </div>
        <div class="modal-footer">
           <form id="deleteForm" method="POST" action="delete_user.php">
            <input type="hidden" id="deleteId" name="deleteId" value="">
            <button type="button" class="btn btn-secondary" id="cancelDelete">Cancel</button>
            <button type="submit" class="btn btn-danger" id="confirmDelete">Delete</button>
        </form>

        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    var deleteButtons = document.querySelectorAll('.delete-btn');
    var modal = document.getElementById('deleteModal');
    var closeModal = document.getElementById('closeModal');
    var cancelDelete = document.getElementById('cancelDelete');
    var confirmDelete = document.getElementById('confirmDelete');
    var deleteIdInput = document.getElementById('deleteId');

    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            var customerID = button.getAttribute('data-id');
            deleteIdInput.value = customerID; // Set customerID in the hidden input
            modal.style.display = 'block';
        });
    });

    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    cancelDelete.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    confirmDelete.addEventListener('click', function() {
        document.getElementById('deleteForm').submit();
    });

    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
});

</script>
