------ Create Schema
CREATE SCHEMA `php_blog` DEFAULT CHARACTER SET utf8 ;

------ Create table User
CREATE TABLE `php_blog`.`user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `first_name` VARCHAR(20) NULL,
  `last_name` VARCHAR(20) NULL,
  `email` VARCHAR(25) NULL,
  `personal_info` TINYTEXT NULL,
  `profile_picture` VARCHAR(80) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

------ Create table Post
CREATE TABLE `post` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(25) NOT NULL,
  `about` VARCHAR(40) NOT NULL,
  `content` TEXT NOT NULL
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

------ Create table Category
CREATE TABLE `category`(
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(20) NOT NULL
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

------ Create table Comment
CREATE TABLE `comment`(
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `content` TEXT NOT NULL
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

------ Create table Tag
CREATE TABLE `tag`(
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(20) NOT NULL
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

------ Add column author_id and category_id to `post`
ALTER TABLE `post`
ADD COLUMN `author_id` INT UNSIGNED NOT NULL;

ALTER TABLE `post`
ADD COLUMN `category_id` INT UNSIGNED NOT NULL;

------ Add foreign key post to user (many to one)
ALTER TABLE `post`
ADD FOREIGN KEY (`author_id`)
REFERENCES `user`(`id`);

------ Add foreign key post to category (many to one)
ALTER TABLE `post`
ADD FOREIGN KEY (`category_id`)
REFERENCES `category`(`id`);

------ Add author_id and post_id to `comment`
ALTER TABLE `comment`
ADD COLUMN `author_id` INT UNSIGNED NOT NULL;

ALTER TABLE `comment`
ADD COLUMN `post_id` INT UNSIGNED NOT NULL;

------ Add foreign key comment to user (many to one)
ALTER TABLE `comment`
ADD FOREIGN KEY (`author_id`)
REFERENCES `user`(`id`);

----- Add foreign key comment to post (many to one)
ALTER TABLE `comment`
ADD FOREIGN KEY (`post_id`)
REFERENCES `post`(`id`);

----- Create buffer table `Post_Tag` connect post and tag (many to many)
CREATE TABLE `POST_TAG`(
  `post_id` INT UNSIGNED NOT NULL,
  `tag_id` INT UNSIGNED NOT NULL
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

------ Add foreign keys to post and tag
ALTER TABLE `post_tag`
ADD FOREIGN KEY (`post_id`)
REFERENCES `post`(`id`);

ALTER TABLE `post_tag`
ADD FOREIGN KEY (`tag_id`)
REFERENCES `tag`(`id`);













