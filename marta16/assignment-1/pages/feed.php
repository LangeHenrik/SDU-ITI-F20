<?php require $_SERVER['DOCUMENT_ROOT'] . "/php/check_login.php" ?>

<!-- floating upload button -->
<button class="feed-upload" onclick="showUploadForm()">+</button>

<!-- HTML template for a post -->
<template id="feed-post-template">

  <div class="feed-post">
    <img class="feed-post-img" src="https://www.w3schools.com/css/paris.jpg"/>
    <div class="feed-post-body">
      <p class="feed-post-title">Dolore magna</p>
      <p class="feed-post-username">@username</p>
      <p class="feed-post-description">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua.
      </p>
    </div>
  </div>

</template>

<!-- post container -->
<div class="feed-container"></div>

<!-- load posts -->
<script>updateFeed()</script>