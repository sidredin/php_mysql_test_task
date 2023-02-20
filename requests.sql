-- # Задание 1
-- 1.
select u.id, u.group_id, u.invited_by_user_id, u.name, u.posts_qty
from `users` as u
         join `users` u_inv on u_inv.id = u.invited_by_user_id
where u.posts_qty > u_inv.posts_qty;

-- 2.
select u.* from `users` as u 
right join (
    select group_id, max(posts_qty) as max_posts_qty
    from users
    group by group_id
) as mpg
on mpg.group_id = u.group_id AND mpg.max_posts_qty = u.posts_qty;

-- 3.
select g.* from `groups` as g
 join (
    select group_id, count(id) as users_count
    from users
    group by group_id
    having count(id) > 10000
) as big_groups
on big_groups.group_id = g.id;

-- 4.
select ul.* from `users` as ul
join `users`  as ur
on ul.invited_by_user_id = ur.id and ul.group_id != ur.group_id;

-- 5.
select g.id, g.name, coalesce (g_posts_qty.total_qty, 0) as total_posts_qty  from `groups` as g
left join (select group_id, sum(posts_qty) as total_qty
from users
group by group_id) as g_posts_qty
on g.id = g_posts_qty.group_id;
