<?php
    /**
    * The blog page model
    */
    require_once 'config/database.php';

    class BlogModel extends Config
    {

        private $message = 'Welcome to Blog page.';

        public function getBlogs()
        {
            $blogRows = $this->selectAll("*", "blog");
            return $blogRows;
        }

    }