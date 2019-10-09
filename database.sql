CREATE TABLE `item` (
 `ItemID` int(11) NOT NULL AUTO_INCREMENT,
 `ItemName` varchar(250) CHARACTER SET latin1 NOT NULL,
 `ItemDesc` varchar(1000) CHARACTER SET latin1 NOT NULL,
 `ItemPrice` float NOT NULL,
 PRIMARY KEY (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `inventory` (
 `ItemID` int(11) NOT NULL,
 `Current_stock` int(11) NOT NULL,
 `Low_stock` int(11) NOT NULL,
 `Expiry_date` date NOT NULL,
 `Shelf` varchar(100) CHARACTER SET latin1 NOT NULL,
 PRIMARY KEY (`ItemID`),
 KEY `ItemID` (`ItemID`),
 CONSTRAINT `ItemID_Constraint` FOREIGN KEY (`ItemID`) REFERENCES `item` (`ItemID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `invoice` (
 `InvoiceID` int(11) NOT NULL AUTO_INCREMENT,
 `InvoiceDate` date NOT NULL,
 PRIMARY KEY (`InvoiceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `invoicedetail` (
 `InvoiceDetail` int(11) NOT NULL AUTO_INCREMENT,
 `InvoiceID` int(11) NOT NULL,
 `ItemID` int(11) NOT NULL,
 `Quantity` int(11) NOT NULL,
 `Total` float NOT NULL,
 PRIMARY KEY (`InvoiceDetail`),
 KEY `InvoiceDetail` (`InvoiceDetail`),
 KEY `InvoiceID` (`InvoiceID`),
 CONSTRAINT `invoicedetail_ibfk_1` FOREIGN KEY (`InvoiceID`) REFERENCES `invoice` (`InvoiceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


