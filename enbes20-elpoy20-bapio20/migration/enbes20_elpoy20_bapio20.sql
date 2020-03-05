-- Host: localhost
-- Generation Time: Mar 03, 2020 at 07:29 AM
-- Server version: 8.0.19
-- PHP Version: 7.3.11

--
-- Database: `enbes20_elpoy20_bapio20`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `image` longblob NOT NULL,
  `header` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `user_id` int NOT NULL
);
-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
);
--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`) VALUES
(1, 'enzobes', '$2y$10$1gvaye4ZPPjA04fcAe3cIO8zAjoJtwrB069z1bxIKVG3Wghci7ezu', 'enzobes@me.com'),
(2, 'enzobes2', '$2y$10$8J2yhRo.6O17RUBuvF6q.e3sAEO0Q20VMGsWeiaai5Iqh3uKGjdby', 'test@enzobes.fr'),
(3, 'enzobes3', '$2y$10$VDttEEn7ixDnuRXgbrUkre8t0/6LwldRrMliKE71pEpheg12HRSfq', 'enzobes3@me.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;
