<?php
   define('ENDPOINTS', [
      '/' => ['ProductsController'],
      '/products/(id:int)/' => ['ProductController'],
      '/uploadcover/' => ['ProductCoverController']
   ]);
