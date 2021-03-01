<?php

# Heroku credential 
$host_heroku = "ec2-54-146-73-98.compute-1.amazonaws.com";
$db_heroku = "ddf8u650c3idu7";
$user_heroku = "ncpbukpjfzqszt";
$pw_heroku = "e7933fdf4496f06b8f50f0a79769a1cb33b16b40e0e087374a67b2b96f77836f";
# Create connection to Heroku Postgres
$conn_string = "postgres://ncpbukpjfzqszt:e7933fdf4496f06b8f50f0a79769a1cb33b16b40e0e087374a67b2b96f77836f@ec2-54-146-73-98.compute-1.amazonaws.com:5432/ddf8u650c3idu7";
$conn = pg_query($conn_string);

if (!$conn)
{
  die('Error: Could not connect: ' . pg_last_error());
}
?>