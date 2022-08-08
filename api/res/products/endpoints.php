<?php
   define('ENDPOINTS', [
      '/' => ['ProductsController', false],
      '/(id:int)/' => ['ProductController'],
      '/uploadcover/' => ['ProductCoverController']
   ]);
