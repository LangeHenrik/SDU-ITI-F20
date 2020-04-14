DROP DATABASE IF EXISTS enbes20_elpoy20_bapio20;
CREATE DATABASE enbes20_elpoy20_bapio20;
USE enbes20_elpoy20_bapio20;

CREATE TABLE `images` (
  `id` int NOT NULL,
  `image` longblob NOT NULL,
  `header` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `user_id` int NOT NULL
);

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
);

INSERT INTO `user` (`id_user`, `username`, `password`, `email`) VALUES
(1, 'UserTest', '$2y$10$5HwiwOFZ2Wr5spaY5GMrdunJ2KiQjmYQqQA9I3Te9WCQT/IsgTPwK', 'usertest@test.com');

ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `images`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;
