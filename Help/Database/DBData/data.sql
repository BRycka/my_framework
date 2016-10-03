--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstname`, `lastname`, `username`, `email`, `password`, `secret_key`) VALUES
('Adminas', 'Adminaitis', 'admin', 'admin@admin.com', 'admin', '0');

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`location`, `date_time`, `price`, `event_status`, `is_paid`, `customer_id`) VALUES
('Šiauliai', '2016-11-11 11:11:11', '100', '0', '0', '1'),
('Vilnius', '2016-11-13 13:13:13', '90', '1', '1', '1'),
('Kaunas', '2016-11-15 15:15:15', '70', '0', '1', '1'),
('Klaipėda', '2016-11-17 17:17:17', '50', '0', '0', '10');
