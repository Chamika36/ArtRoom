-- Insert data into the package table
INSERT INTO `package` (`Name`, `Description`, `Price`, `ServicesIncluded`) VALUES
('Wedding', 'Full-day wedding photography package', 199999.99, 'Ceremony coverage, Reception coverage, 300 edited photos, Online gallery'),
('Portrait', 'Portrait photography session', 149.99, '1-hour session, 10 edited photos, Studio or outdoor location'),
('Event', 'Event photography coverage', 299.99, '4-hour coverage, Unlimited photos, Candid shots'),
('Travel', 'Travel photography adventure', 899.99, '3-day adventure, 100 edited photos, Customized itinerary');

-- Insert data into the sample table
INSERT INTO `sample` (`SampleName`, `ImagePath`, `CustomerID`, `Description`, `Date`) VALUES
('Family Portrait', 'family.jpg', 1, 'Outdoor family photo shoot', '2023-08-22'),
('Landscape View', 'landscape.jpg', 1, 'Beautiful landscape shot', '2023-09-10'),
('Wedding Moments', 'wedding.jpg', 1, 'Wedding ceremony photos', '2023-08-28');

INSERT INTO `usertype` (`UserTypeID`, `UserType`, `PermissionID`) VALUES
(1, 'Customer', NULL),
(2, 'Manager', NULL),
(3, 'Photographer', NULL),
(4, 'Editor', NULL),
(5, 'Printing Firm', NULL),
(6, 'Admin', NULL);