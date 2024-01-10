<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Event</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/manageevent.css">
</head>
<body>
    <div class="container2">
        <h2>Manage Event</h2>
        <div class="event-details">
            <h3>Event Details</h3>
            <ul>
                <li><strong>Event Name:</strong> <?php echo $data['package']->Name; ?></li>
                <li><strong>Event Id:</strong> <?php echo $data['event']->EventID; ?></li>
                <li><strong>Date:</strong> <?php echo $data['event']->EventDate; ?></li>
                <li><strong>Location:</strong> <?php echo $data['event']->Location; ?></li>
                <li><strong>Status:</strong> <?php echo $data['event']->Status; ?></li>
                <li><strong>Additional Requests:</strong> <?php echo $data['event']->AdditionalRequests; ?></li>
                <li><strong>Requsted Photographer:</strong> <?php echo $data['requestedPhotographer']->FirstName . ' ' . $data['requestedPhotographer']->LastName; ?></li>
            </ul>
        </div>
        <div class="partners">
        <?php echo var_dump($data['photographers']);?>
        <?php echo $data['event']->EventDate; ?>
        <?php echo var_dump($data['events']);?>
            <h3>Allocate Partners</h3>
            <form action="<?php echo URLROOT; ?>/events/allocate/<?php echo $data['event']->EventID; ?>" method="POST">
                <div class="form-group">
                    <label for="photographer">Photographer:</label>
                    <select name="photographer" id="photographer" required>
                        <option value="">Select a photographer</option>
                        <?php foreach ($data['photographers'] as $photographer) : ?>
                            <option value="<?php echo $photographer->UserID; ?>"><?php echo $photographer->FirstName . ' ' . $photographer->LastName; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="editor">Editor:</label>
                    <select name="editor" id="editor" required>
                        <option value="">Select an editor</option>
                        <?php foreach ($data['editors'] as $editor) : ?>
                            <option value="<?php echo $editor->UserID; ?>"><?php echo $editor->FirstName . ' ' . $editor->LastName; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="printingFirm">Printing Firm:</label>
                    <select name="printingFirm" id="printingFirm" required>
                        <option value="">Select a printing firm</option>
                        <?php foreach ($data['printingFirms'] as $printingFirm) : ?>
                            <option value="<?php echo $printingFirm->UserID; ?>"><?php echo $printingFirm->FirstName . ' ' . $printingFirm->LastName; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Allocate">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
