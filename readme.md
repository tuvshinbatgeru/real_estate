ALTER TABLE `real_estate`.`ads` 
ADD COLUMN `menu_id` INT(10) UNSIGNED NOT NULL AFTER `id`;

ALTER TABLE `real_estate`.`point_of_interests` 
ADD COLUMN `type` VARCHAR(255) NOT NULL DEFAULT 'point' AFTER `place_name`;
