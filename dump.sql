create table `groups`
(
    `id`   int         NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
);

create table users
(
    `id`                 int         not null primary key,
    `group_id`           int         not null,
    `invited_by_user_id` int         not null,
    `name`               varchar(50) not null,
    `posts_qty`          int         not null,
    constraint `fk_users_group_id`
        foreign key (`group_id`) references `groups` (`id`)
            on update cascade on delete cascade
);

insert into `groups`
    (`id`, `name`)
values (1, 'Группа 1'),
       (2, 'Группа 2');

insert into `users`
    (`id`, `group_id`, `invited_by_user_id`, `name`, `posts_qty`)
values (1, 1, 0, 'Пользователь 1', 0),
       (2, 1, 1, 'Пользователь 2', 2),
       (3, 1, 2, 'Пользователь 3', 5),
       (4, 2, 3, 'Пользователь 4', 7),
       (5, 2, 4, 'Пользователь 5', 1);
