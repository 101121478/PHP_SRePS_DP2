INSERT INTO `item` (`ItemID`, `ItemName`, `ItemDesc`, `ItemPrice`) VALUES (1, 'Panadol 500mg tablets', 'Painkiller medication, designed to be used as an analgesic. May help in reducing fever.', '5.99');
INSERT INTO `item` (`ItemID`, `ItemName`, `ItemDesc`, `ItemPrice`) VALUES (2, 'Codral PE Day & Night tablets', 'Ideal for headaches and fever, blocked/runny nose and body aches & pains. Contains 36 Day capsules and 12 Night capsules.', '17.99');
INSERT INTO `item` (`ItemID`, `ItemName`, `ItemDesc`, `ItemPrice`) VALUES (3, 'Betadine Sore Throat Lozenges', 'Relieves sore throat discomfort, helps kill bacteria.', '7.99');
INSERT INTO `item` (`ItemID`, `ItemName`, `ItemDesc`, `ItemPrice`) VALUES (4, 'Vicks Action Cold and Flu', 'Vicks Action Cold & Flu Night Relief from 6 cold and flu symptoms: blocked noses, headaches, runny noses, sneezing, sore throat pain and fever.', '11.49');
INSERT INTO `item` (`ItemID`, `ItemName`, `ItemDesc`, `ItemPrice`) VALUES (5, 'Bisolvon Dry Cough Liquid', 'Bisolvon Dry Liquid is used to relieve a dry, irritating cough.', '13.99');

INSERT INTO `inventory` (`ItemID`, `Current_stock`, `Low_stock`, `Expiry_date`, `Shelf`) VALUES ('1', '60', '10', '2020-10-27', 'EA-20');
INSERT INTO `inventory` (`ItemID`, `Current_stock`, `Low_stock`, `Expiry_date`, `Shelf`) VALUES ('2', '40', '5', '2020-09-18', 'FD-14');
INSERT INTO `inventory` (`ItemID`, `Current_stock`, `Low_stock`, `Expiry_date`, `Shelf`) VALUES ('3', '200', '30', '2024-06-03', 'SM-91');
INSERT INTO `inventory` (`ItemID`, `Current_stock`, `Low_stock`, `Expiry_date`, `Shelf`) VALUES ('4', '85', '10', '2022-08-01', 'AA-09');
INSERT INTO `inventory` (`ItemID`, `Current_stock`, `Low_stock`, `Expiry_date`, `Shelf`) VALUES ('5', '95', '25', '2023-05-15', 'XV-18');

INSERT INTO `invoice` (`InvoiceID`, `InvoiceDate`) VALUES ('1', '2019-09-24');
INSERT INTO `invoice` (`InvoiceID`, `InvoiceDate`) VALUES ('2', '2019-09-25');
INSERT INTO `invoice` (`InvoiceID`, `InvoiceDate`) VALUES ('3', '2019-09-28');
INSERT INTO `invoice` (`InvoiceID`, `InvoiceDate`) VALUES ('4', '2019-10-01');
INSERT INTO `invoice` (`InvoiceID`, `InvoiceDate`) VALUES ('5', '2019-10-03');

INSERT INTO `invoicedetail` (`InvoiceDetail`, `InvoiceID`, `ItemID`, `Quantity`, `Total`) VALUES ('1', '1', '1', '3', '18.51');
INSERT INTO `invoicedetail` (`InvoiceDetail`, `InvoiceID`, `ItemID`, `Quantity`, `Total`) VALUES ('2', '1', '2', '5', '64.31');
INSERT INTO `invoicedetail` (`InvoiceDetail`, `InvoiceID`, `ItemID`, `Quantity`, `Total`) VALUES ('3', '2', '2', '3', '73.10');
INSERT INTO `invoicedetail` (`InvoiceDetail`, `InvoiceID`, `ItemID`, `Quantity`, `Total`) VALUES ('4', '2', '4', '10', '61.10');
INSERT INTO `invoicedetail` (`InvoiceDetail`, `InvoiceID`, `ItemID`, `Quantity`, `Total`) VALUES ('5', '3', '3', '3', '11.09');
INSERT INTO `invoicedetail` (`InvoiceDetail`, `InvoiceID`, `ItemID`, `Quantity`, `Total`) VALUES ('6', '4', '4', '3', '108.51');
INSERT INTO `invoicedetail` (`InvoiceDetail`, `InvoiceID`, `ItemID`, `Quantity`, `Total`) VALUES ('7', '5', '5', '3', '63.25');