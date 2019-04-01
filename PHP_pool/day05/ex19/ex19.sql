SELECT ABS(DATEDIFF(MAX(last_projection), MIN(last_projection))) AS 'uptime' FROM film;
