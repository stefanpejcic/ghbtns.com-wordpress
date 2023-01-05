<?php
/**
 * Plugin Name: GitHub Embed
 * Description: Allows you to embed a GitHub repository on a page or post using a repository URL.
 * Version: 1.0
 * Author: Stefan Pejcic
 */

function github_embed_shortcode($atts) {
  $a = shortcode_atts(array(
    'url' => ''
  ), $atts);

  $repo_parts = explode('/', $a['url']);
  $user = $repo_parts[3];
  $repo = rtrim($repo_parts[4], '.git');

  $output = '<div class="github-embed">';
  $output .= '<iframe src="https://ghbtns.com/github-btn.html?user=' . $user . '&repo=' . $repo . '&type=star&count=true" frameborder="0" scrolling="0" width="170px" height="20px"></iframe>';
  $output .= '<iframe src="https://ghbtns.com/github-btn.html?user=' . $user . '&repo=' . $repo . '&type=fork&count=true" frameborder="0" scrolling="0" width="170px" height="20px"></iframe>';
  $output .= '<iframe src="https://ghbtns.com/github-btn.html?user=' . $user . '&repo=' . $repo . '&type=follow&count=true" frameborder="0" scrolling="0" width="170px" height="20px"></iframe>';
  $output .= '</div>';

  return $output;
}
add_shortcode('github', 'github_embed_shortcode');
