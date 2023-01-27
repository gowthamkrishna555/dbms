<?php
    include('conn.php');
    $query = "SHOW TRIGGERS LIKE 'trigger_name'";
    $result = mysqli_query($conn, $query);
    $trigger = mysqli_fetch_assoc($result);
    
?>
<html>
    <head>
        <style>
            #trigger-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background: #fff;
    width: 80%;
    margin: 10% auto;
    padding: 20px;
    border-radius: 5px;
}

.modal-header {
    text-align: center;
    margin-bottom: 20px;
}

.modal-footer {
    text-align: center;
    margin-top: 20px;
}
#modal:target {
    display: block; /* Show the modal */
}

.close-modal {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close-modal:hover,
.close-modal:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

</style>
</head>
<body>
<div id="trigger-modal" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Trigger Information</h2>
        </div>
        <div class="modal-body">
            <div class="trigger-name">Trigger Name: <?php echo $trigger['Trigger']; ?></div>
            <div class="trigger-event">Event: <?php echo $trigger['Event']; ?></div>
            <div class="trigger-table">Table: <?php echo $trigger['Table']; ?></div>
            <div class="trigger-statement">Statement: <?php echo $trigger['Statement']; ?></div>
        </div>
        <div class="modal-footer">
            <button id="close-modal">Close</button>
        </div>
    </div>
</div>
</body>
</html>