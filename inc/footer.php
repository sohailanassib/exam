<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/toastr/build/toastr.min.js"></script>
<script>
    var jsVar = <?php echo json_encode($error); ?>;
    if (jsVar != null) {
        toastr.info(jsVar.toString())
    }

    function deleteRecord(recordId) {
    if (!confirm('Are you sure you want to delete this record?')) {
        return;
    }

    $.ajax({
        url: './handlers/delete.php',
        type: 'POST',
        data: {
            action: 'delete',
            id: recordId
        },
        success: function(response) {
            console.log(response);
            alert("Record deleted successfully.");
            window.location.href = 'index.php';
        },
        error: function(xhr, status, error) {
            alert("Error deleting record: " + xhr.status + " " + error);
        }
    });
}
</script>
</body>
</html>