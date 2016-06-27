ALTER TABLE `Forum` ADD `num_posts` INT(3) NOT NULL AFTER `label`, ADD `max_points` INT(3) NOT NULL AFTER `num_posts`;

SELECT personID, firstName, lastName,
  SUM(score) AS score_sum,
  COuNT(id) AS post_num,
  ROUND(SUM(forum_points),2) AS forum_points_ttl,
  IF (
      SUM(forum_points)>Post_Score_Data.forum_max_points,
      Post_Score_Data.forum_max_points,
      ROUND(SUM(forum_points),2)
  ) AS forum_points_ttl_cap,
--   x IF (
--       SUM(forum_posts_perc)>1,
--       1,
--       SUM(forum_posts_perc)
--   ) AS forum_posts_perc_ttl_cap,
--   x SUM(max_points) AS points_poss,
--   x AVG(score_perc) AS score_avg,
--   x SUM(score) / SUM(max_points) * 100 AS weighted_perc,
--   x SUM(forum_posts_perc) AS forum_posts_perc_ttl
FROM post_score_data
WHERE section = 779 AND forum = 1
GROUP BY personID;