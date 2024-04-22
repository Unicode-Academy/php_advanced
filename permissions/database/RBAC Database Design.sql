CREATE TABLE `users` (
  `id` int PRIMARY KEY,
  `name` varchar(50),
  `email` varchar(100) UNIQUE,
  `password` varchar(100),
  `status` boolean DEFAULT false,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `products` (
  `id` int PRIMARY KEY,
  `name` varchar(200),
  `price` int DEFAULT 0,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `posts` (
  `id` int PRIMARY KEY,
  `title` varchar(200),
  `content` text,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `roles` (
  `id` int PRIMARY KEY,
  `name` varchar(200),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `users_roles` (
  `id` int PRIMARY KEY,
  `user_id` int,
  `role_id` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `permissons` (
  `id` int PRIMARY KEY,
  `value` varchar(100),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `roles_permissions` (
  `id` int PRIMARY KEY,
  `role_id` int,
  `permission_id` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `users_permissions` (
  `id` int PRIMARY KEY,
  `user_id` int,
  `permission_id` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `modules` (
  `id` int PRIMARY KEY,
  `name` varchar(100),
  `title` varchar(200),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `actions` (
  `id` int PRIMARY KEY,
  `name` varchar(100),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `modules_actions` (
  `id` int PRIMARY KEY,
  `module_id` int,
  `action_id` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

ALTER TABLE `users_roles` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `users_roles` ADD FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

ALTER TABLE `roles_permissions` ADD FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

ALTER TABLE `roles_permissions` ADD FOREIGN KEY (`permission_id`) REFERENCES `permissons` (`id`);

ALTER TABLE `users_permissions` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `users_permissions` ADD FOREIGN KEY (`permission_id`) REFERENCES `permissons` (`id`);

ALTER TABLE `modules_actions` ADD FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`);

ALTER TABLE `modules_actions` ADD FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`);
