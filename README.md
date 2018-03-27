# Netlify Rebuild
Simple plugin which makes a POST request to a Netlify webhook (or any webhook for that matter) on post save. It only runs if publishing a post for the first time, or updating a published post.

The Netlify webhook should be defines in the WordPress wp-config.php file. Example...
`define('NETLIFY_WEBHOOK', 'https://api.netlify.com/build_hooks/xxxxxxxxxxx');`