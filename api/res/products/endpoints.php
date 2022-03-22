<?php
   define('ENDPOINTS', [
      '/' => ['ProductsController'],
      '/(id:int)/' => ['ProductController'],
      '/uploadcover/' => ['ProductCoverController']
   ]);
