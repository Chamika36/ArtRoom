<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Event</title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/manager/manageevent.css">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</head>
<body>
    <!-- <h2>Manage Event</h2> -->
    <div class="container2">
        <div class="event-details">
            <h3>Event Details</h3>
            <ul>
                <li><strong>Event Name:</strong> <?php echo $data['package']->Name; ?></li>
                <li><strong>Event Id:</strong> <?php echo $data['event']->EventID; ?></li><li><strong>Customer Name:</strong> <?php echo $data['customer']->FirstName . ' ' . $data['customer']->LastName; ?></li>
                <li><strong>Date:</strong> <?php echo $data['event']->EventDate; ?></li>
                <li><strong>Start Time:</strong> <?php echo $data['event']->StartTime; ?></li>
                <li><strong>End Time:</strong> <?php echo $data['event']->EndTime; ?></li>
                <li><strong>Location:</strong> <?php echo $data['event']->Location; ?> <button id="viewLocationButton" class="map-button"><i class="fas fa-map-marker-alt"></i> View on Map</button></li>
                <li><strong>Status:</strong> <?php echo $data['event']->Status; ?></li>
                <li><strong>Additional Requests:</strong> <?php echo $data['event']->AdditionalRequests; ?></li>
                <li><strong>Requsted Photographer:</strong> <?php echo $data['requestedPhotographer']->FirstName . ' ' . $data['requestedPhotographer']->LastName; ?></li>
            </ul>
        </div>
        <div class="event-details">
            <?php if($data['event']->Status == 'Canceled') : ?>
                <h3>Event Canceled</h3>
            <?php else : ?>
                <h3>Allocate Partners</h3>
                <form action="<?php echo URLROOT; ?>/events/allocate/<?php echo $data['event']->EventID; ?>" method="POST">
                    <div class="form-group">
                        <label for="photographer">Photographer:</label>
                        <select name="photographer" id="photographer" required>
                            <option value="<?php echo $data['requestedPhotographer']->UserID?>"><?php echo $data['requestedPhotographer']->FirstName . ' ' . $data['requestedPhotographer']->LastName; ?></option>
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
                        <input class="button" type="submit" value="Allocate">
                    </div>
                </form>

            <!-- cancel event -->
            <form action="<?php echo URLROOT; ?>/events/updateEventStatus/<?php echo $data['event']->EventID; ?>/Canceled" method="POST">
                <div class="form-group">
                    <input class="button" type="submit" value="Cancel Event">
                </div>
            </form>

            <?php endif; ?>
        </div>
    </div>

    <script>
       document.getElementById('viewLocationButton').addEventListener('click', function () {
            var latitude = <?php echo $data['event']->Latitude; ?>;
            var longitude = <?php echo $data['event']->Longitude; ?>;
            
            // Open OpenStreetMap in a new window with the specified coordinates
            var mapUrl = `https://www.openstreetmap.org/?mlat=${latitude}&mlon=${longitude}#map=13/${latitude}/${longitude}`;
            window.open(mapUrl, '_blank');
        });

        
    </script>
</body>
</html>
